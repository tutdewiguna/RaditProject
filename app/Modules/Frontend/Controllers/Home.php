<?php

namespace Frontend\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;
class Home extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $newsModel = new \App\Models\NewsModel();

        $data['products'] = $productModel
            ->select('products.*, categories.slug AS category_slug')
            ->join('categories', 'categories.id = products.category_id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll(8);

        $data['news'] = $newsModel->orderBy('created_at', 'DESC')->findAll(6);

        // Reverting to include 'Views' in the path as the Namespace 'Frontend' maps to the module root, not the Views folder.
        return view('Frontend\home', $data);
    }
    public function shop(): string
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel
            ->select('products.*, categories.slug AS category_slug')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();

        return view('Frontend\shop', $data);
    }
    public function contact(): string
    {
        return view('Frontend\contact');
    }

    // News methods moved to Frontend\Controllers\NewsController


    public function cart(): string
    {
        return view('Frontend\cart');
    }
}
