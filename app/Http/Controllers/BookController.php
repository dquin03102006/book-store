<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('book-detail', compact('book'));
    }
}
