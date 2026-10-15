<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = DB::table('cart_items')
            ->join('books', 'cart_items.book_id', '=', 'books.id')
            ->where('cart_items.user_id', Auth::id())
            ->select('cart_items.*', 'books.title', 'books.price')
            ->get();

        return view('cart.index', compact('cartItems'));
    }
}