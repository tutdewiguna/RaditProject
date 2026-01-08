<?php

namespace Frontend\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Shop extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $q = $this->request->getGet('q');

        $query = $productModel
            ->select('products.*, categories.slug AS category_slug')
            ->join('categories', 'categories.id = products.category_id');

        if (!empty($q)) {
            $query->groupStart()
                ->like('products.name', $q)
                ->orLike('products.description', $q)
                ->groupEnd();
        }

        $data['products'] = $query
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data['keyword'] = $q;

        return view('Frontend\shop', $data);
    }

    public function detail($slug)
    {
        $productModel = new ProductModel();

        $product = $productModel
            ->select('products.*, categories.slug AS category_slug')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.slug', $slug)
            ->first();

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['product'] = $product;

        return view('Frontend\shop_detail', $data);
    }
}
