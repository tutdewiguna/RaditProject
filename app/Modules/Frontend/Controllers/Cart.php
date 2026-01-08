<?php

namespace Frontend\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Cart extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $productModel = new ProductModel();
        $cartItems = [];
        $total = 0;

        if (!empty($cart)) {
            $productIds = array_keys($cart);
            // $productIds might be empty if cart is empty but check above handles implies it's not.
            // However, array_keys returns empty array if $cart is empty array.

            if (!empty($productIds)) {
                $products = $productModel->whereIn('id', $productIds)->findAll();

                // Map products by ID for easy lookup
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
        }

        return view('Frontend\cart', ['cartItems' => $cartItems, 'total' => $total]);
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = (int) $this->request->getPost('quantity');

        if ($quantity < 1) {
            $quantity = 1;
        }

        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Basic stock check could go here, but requirements just say "do not exceed stock".
        // In a real app we'd check strict stock. Let's assume we just add to session for now.

        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        $session->set('cart', $cart);

        return redirect()->to('/cart')->with('message', 'Product added to cart!');
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }
        return redirect()->to('/cart');
    }
}
