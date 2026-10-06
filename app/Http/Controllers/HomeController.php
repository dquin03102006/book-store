<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $keyword = request('keyword');
        $category = request('category');
        $price = request('price');
        $sort = request('sort');

        $books = Book::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('author', 'like', '%' . $keyword . '%');
        })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->when($price, function ($query) use ($price) {
                if ($price == 'under100') {
                    $query->where('price', '<', 100000);
                } elseif ($price == '100to150') {
                    $query->whereBetween('price', [100000, 150000]);
                } elseif ($price == 'over150') {
                    $query->where('price', '>', 150000);
                }
            })
            ->when($sort == 'price_asc', function ($query) {
                $query->orderBy('price', 'asc');
            })
            ->when($sort == 'price_desc', function ($query) {
                $query->orderBy('price', 'desc');
            })
            ->when($sort == 'latest' || !$sort, function ($query) {
                $query->latest();
            })
            ->get();

        $categories = Category::all();

       return view('home', compact('books', 'keyword', 'category', 'price', 'sort', 'categories'));
    }
}
