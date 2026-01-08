<?php

namespace Frontend\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrdersModel;
use App\Models\UserModel;

class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart');

        if (empty($cart)) {
            return redirect()->to('shop')->with('error', 'Your cart is empty.');
        }

        $cartControl = new Cart();
        // Since we can't easily call other controller methods and get their return data without HMVC, 
        // we duplicate the cart calculation logic or make it a library. 
        // For speed/simplicity, I will duplicate the calculation logic here.

        $productModel = new ProductModel();
        $cartItems = [];
        $total = 0;

        $productIds = array_keys($cart);
        if (!empty($productIds)) {
            $products = $productModel->whereIn('id', $productIds)->findAll();
            $productsMap = [];
            foreach ($products as $p) {
                $productsMap[$p['id']] = $p;
            }

            foreach ($cart as $id => $qty) {
                if (isset($productsMap[$id])) {
                    $product = $productsMap[$id];
                    $subtotal = $product['price'] * $qty;
                    $total += $subtotal;

                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $qty,
                        'subtotal' => $subtotal
                    ];
                }
            }
        }

        $data = [
            'cartItems' => $cartItems,
            'total' => $total
        ];

        return view('Frontend\checkout', $data);
    }

    public function process()
    {
        $session = session();
        $cart = $session->get('cart');

        if (empty($cart)) {
            return redirect()->to('shop');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'address' => 'required',
            'phone' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');

        // 1. Resolve User ID
        $userId = null;
        if (session()->get('isUserLoggedIn')) {
            $userId = session()->get('userId');
        } else {
            $userModel = new UserModel();
            $existingUser = $userModel->where('email', $email)->first();

            if ($existingUser) {
                $userId = $existingUser['id'];
            } else {
                // Create new user for guest
                $userData = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT),
                    'role_id' => 2 // User role
                ];
                $userModel->insert($userData);
                $userId = $userModel->getInsertID();
            }
        }

        // 2. Save Orders
        $orderModel = new OrdersModel();
        $productModel = new ProductModel();

        // We need product prices again to be secure
        $productIds = array_keys($cart);
        $products = $productModel->whereIn('id', $productIds)->findAll();
        $productsMap = [];
        foreach ($products as $p) {
            $productsMap[$p['id']] = $p;
        }

        foreach ($cart as $productId => $qty) {
            if (isset($productsMap[$productId])) {
                $product = $productsMap[$productId];
                $totalPrice = $product['price'] * $qty;

                $orderData = [
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'total_price' => $totalPrice, // Schema column is total_price
                    'status' => 'pending'
                ];

                $orderModel->insert($orderData);
            }
        }

        // 3. Clear Cart
        $session->remove('cart');

        return view('Frontend\success');
    }
}
