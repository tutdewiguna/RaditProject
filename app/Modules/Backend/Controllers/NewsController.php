<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $data['news'] = $this->newsModel->findAll();
        return view('Backend\Views\news\index', $data);
    }

    public function create()
    {
        return view('Backend\Views\news\create');
    }

    public function store()
    {
        $this->newsModel->save([
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'image' => $this->request->getPost('image'),
        ]);
        return redirect()->to('admin/news');
    }

    public function edit($id)
    {
        $data['news'] = $this->newsModel->find($id);
        return view('Backend\Views\news\edit', $data);
    }

    public function update($id)
    {
        $this->newsModel->update($id, [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'image' => $this->request->getPost('image'),
        ]);
        return redirect()->to('admin/news');
    }

    public function delete($id)
    {
        $this->newsModel->delete($id);
        return redirect()->to('admin/news');
    }
}
