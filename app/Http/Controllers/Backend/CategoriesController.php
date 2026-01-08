<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $data['categories'] = Category::all();
        return view('Backend.Views.categories.index', $data);
    }

    public function create()
    {
        return view('Backend.Views.categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('Backend.Views.categories.edit', $data);
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}

