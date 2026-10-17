<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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
            ->limit(12)
            ->get();

        $categories = Category::all();
        return view('home', compact('books', 'keyword', 'category', 'price', 'sort', 'categories'));
    }
    public function categories()
    {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function category(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $query = Book::where('category_id', $id);

        $keyword = trim($request->input('keyword', ''));

        if ($keyword !== '') {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('author', 'like', '%' . $keyword . '%');
            });
        }


        // Lọc theo khoảng giá
        switch ($request->input('price')) {
            case 'under100':
                $query->where('price', '<', 100000);
                break;

            case '100to150':
                $query->whereBetween('price', [100000, 150000]);
                break;

            case 'over150':
                $query->where('price', '>', 150000);
                break;
        }

        // Sắp xếp sách
        switch ($request->input('sort', 'latest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;

            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;

            default:
                $query->latest();
                break;
        }

        // Chỉ giới hạn 10 cuốn khi hiển thị danh sách
        $books = $query->limit(10)->get();

        $categories = Category::all();

        return view('category', compact('books', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        $books = Book::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('author', 'like', '%' . $keyword . '%')
            ->latest()
            ->get();

        $categories = Category::all();

        return view('search', compact('books', 'categories', 'keyword'));
    }
}
