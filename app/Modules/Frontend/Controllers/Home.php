<?php

namespace Frontend\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;
class Home extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();

    $data['products'] = $productModel
        ->select('products.*, categories.slug AS category_slug')
        ->join('categories', 'categories.id = products.category_id')
        ->findAll();
        return view('Frontend\Views\home', $data);
    }
     public function shop(): string
    {
        return view('Frontend\Views\shop');
    } public function contact(): string
    {
        return view('Frontend\Views\contact');
    } public function news(): string
    {
        return view('Frontend\Views\news');
    }
}
