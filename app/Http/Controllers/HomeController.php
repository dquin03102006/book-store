<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $keyword = request('keyword');

        $books = Book::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('author', 'like', '%' . $keyword . '%');
        })->latest()->get();

        return view('home', compact('books', 'keyword'));
    }
}
