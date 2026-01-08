<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoriesModel;

class ProductsController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
         $this->categoriesModel = new CategoriesModel();
    }

    public function index()
    {
         $data['categories'] = $this->categoriesModel->findAll();
        $data['products'] = $this->productModel->findAll();
         return view('Backend\Views\products\index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoriesModel->findAll();
       return view('Backend\Views\products\create', $data);
    }

   public function store()
{
    $image = $this->request->getFile('image');
    $imagePath = null;

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName();
        $image->move('uploads/products', $newName);
        $imagePath = 'uploads/products/' . $newName; // PATH YANG DISIMPAN
    }

    $this->productModel->save([
        'name'        => $this->request->getPost('name'),
        'slug'        => $this->request->getPost('slug'),
        'price'       => $this->request->getPost('price'),
        'stock'       => $this->request->getPost('stock'),
        'description' => $this->request->getPost('description'),
        'category_id' => $this->request->getPost('category_id'),
        'image'       => $imagePath
    ]);

    return redirect()->to('admin/products');
}


    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
         $data['categories'] = $this->categoriesModel->findAll();
       return view('Backend\Views\products\edit', $data);
    }

    public function update($id)
{
    $image = $this->request->getFile('image');
    $data = [
        'name'        => $this->request->getPost('name'),
        'slug'        => $this->request->getPost('slug'),
        'price'       => $this->request->getPost('price'),
        'stock'       => $this->request->getPost('stock'),
        'description' => $this->request->getPost('description')
    ];

    if ($image && $image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName();
        $image->move('uploads/products', $newName);
        $data['image'] = 'uploads/products/' . $newName;
    }

    $this->productModel->update($id, $data);

    return redirect()->to('admin/products');
}


    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('admin/products');
    }
}
