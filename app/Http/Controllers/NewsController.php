<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_active', true)
            ->latest()
            ->get();

        $categories = Category::all();

        return view('news.index', compact('news', 'categories'));
    }

    public function show(string $id)
    {
        $article = News::where('is_active', true)
            ->findOrFail($id);

        $categories = Category::all();

        return view('news.show', compact('article', 'categories'));
    }
}
