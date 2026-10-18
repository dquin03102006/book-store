<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path('images/news'))) {
                mkdir(public_path('images/news'), 0755, true);
            }

            $image->move(public_path('images/news'), $imageName);
            $data['image'] = $imageName;
        }

        $data['is_active'] = $request->boolean('is_active');

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Thêm bài viết thành công.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.news.edit', $id);
    }

    public function edit(string $id)
    {
        $article = News::findOrFail($id);

        return view('admin.news.edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $article = News::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path('images/news'))) {
                mkdir(public_path('images/news'), 0755, true);
            }

            $image->move(public_path('images/news'), $imageName);

            $oldPath = public_path('images/news/' . basename($article->image ?? ''));

            if ($article->image && is_file($oldPath)) {
                unlink($oldPath);
            }

            $data['image'] = $imageName;
        }

        $data['is_active'] = $request->boolean('is_active');

        $article->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Cập nhật bài viết thành công.');
    }

    public function destroy(string $id)
    {
        $article = News::findOrFail($id);

        $imagePath = public_path('images/news/' . basename($article->image ?? ''));

        if ($article->image && is_file($imagePath)) {
            unlink($imagePath);
        }

        $article->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Xóa bài viết thành công.');
    }
}