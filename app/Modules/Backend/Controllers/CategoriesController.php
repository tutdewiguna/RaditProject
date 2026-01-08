<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoriesModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('Backend\Views\categories\index', $data);
    }

    public function create()
    {
        return view('Backend\Views\categories\create');
    }

    public function store()
    {
        $this->categoryModel->save([
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
        ]);
        return redirect()->to('admin/categories');
    }

    public function edit($id)
    {
        $data['category'] = $this->categoryModel->find($id);
        return view('Backend\Views\categories\edit', $data);
    }

    public function update($id)
    {
        $this->categoryModel->update($id, [
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
        ]);
        return redirect()->to('admin/categories');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('admin/categories');
    }
}
