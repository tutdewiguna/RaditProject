<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('Frontend.Views.home', ['products' => $products]);
    }

    public function shop()
    {
        return view('Frontend.Views.shop');
    }

    public function contact()
    {
        return view('Frontend.Views.contact');
    }

    public function news()
    {
        return view('Frontend.Views.news');
    }
}

