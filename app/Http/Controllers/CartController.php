<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$bookId])) {
            $cart[$bookId]['quantity']++;
        } else {
            $cart[$bookId] = [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'price' => $book->price,
                'image' => $book->image,
                'quantity' => 1,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã thêm sách vào giỏ hàng!');
    }

    public function update(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = (int) $request->input('quantity');
            $cart[$id]['quantity'] = max(1, $quantity);
        }

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã cập nhật số lượng!');
    }

    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}