<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        $categories = Category::all();

        return view('book-detail', compact('book', 'categories'));
    }
}
