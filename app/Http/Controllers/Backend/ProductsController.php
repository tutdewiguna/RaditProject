<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    protected $productModel;
    protected $categoriesModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoriesModel = new Category();
    }

    public function index()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        return view('Backend.Views.products.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('Backend.Views.products.create', $data);
    }

    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        }

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['categories'] = Category::all();
        return view('Backend.Views.products.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
        }

        Product::where('id', $id)->update($data);

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}

