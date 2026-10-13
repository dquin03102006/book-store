<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->q, fn ($query, $q) => $query->where(
                fn ($w) => $w->where('title', 'like', "%$q%")->orWhere('author', 'like', "%$q%")
            ))
            ->when($request->category_id, fn ($query, $id) => $query->where('category_id', $id))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('admin.books.index', compact('books', 'categories'));
    }

    public function create()
    {
        return view('admin.books.form', [
            'book' => new Book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Thêm sản phẩm thành công.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.form', [
            'book' => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($book);
            $data['image'] = $request->file('image')->store('books', 'public');
        } else {
            unset($data['image']);
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    public function destroy(Book $book)
    {
        if ($book->orderItems()->exists()) {
            return back()->with('error', 'Không thể xoá sản phẩm đã có trong đơn hàng.');
        }

        $this->deleteImage($book);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Đã xoá sản phẩm.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function deleteImage(Book $book): void
    {
        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }
    }
}
