<?php

namespace Frontend\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->orderBy('created_at', 'DESC')->findAll();

        return view('Frontend\news', $data);
    }

    public function detail($slug)
    {
        $newsModel = new NewsModel();
        $newsItem = $newsModel->where('slug', $slug)->first();

        if (empty($newsItem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('News item not found: ' . $slug);
        }

        // Fetch related news (latest 3 excluding current)
        $relatedNews = $newsModel->where('id !=', $newsItem['id'])
            ->orderBy('created_at', 'DESC')
            ->findAll(3);

        $data = [
            'news_item' => $newsItem,
            'related_news' => $relatedNews,
            'title' => $newsItem['title'] // For title tag
        ];

        return view('Frontend\news_detail', $data);
    }
}
