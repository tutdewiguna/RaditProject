<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function index()
    {
        $data['news'] = News::all();
        return view('Backend.Views.news.index', $data);
    }

    public function create()
    {
        return view('Backend.Views.news.create');
    }

    public function store(Request $request)
    {
        News::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.news.index');
    }

    public function edit($id)
    {
        $data['news'] = News::findOrFail($id);
        return view('Backend.Views.news.edit', $data);
    }

    public function update(Request $request, $id)
    {
        News::where('id', $id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.news.index');
    }

    public function delete($id)
    {
        News::destroy($id);
        return redirect()->route('admin.news.index');
    }
}

