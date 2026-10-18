<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'link' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        if (!is_dir(public_path('images/banners'))) {
            mkdir(public_path('images/banners'), 0755, true);
        }

        $image->move(public_path('images/banners'), $imageName);

        $data['image'] = $imageName;
        $data['is_active'] = $request->boolean('is_active');

        Banner::create($data);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Thêm banner thành công.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.banners.edit', $id);
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'link' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            if (!is_dir(public_path('images/banners'))) {
                mkdir(public_path('images/banners'), 0755, true);
            }

            $image->move(public_path('images/banners'), $imageName);

            $oldPath = public_path('images/banners/' . basename($banner->image));

            if (is_file($oldPath)) {
                unlink($oldPath);
            }

            $data['image'] = $imageName;
        }

        $data['is_active'] = $request->boolean('is_active');

        $banner->update($data);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Cập nhật banner thành công.');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        $imagePath = public_path('images/banners/' . basename($banner->image));

        if (is_file($imagePath)) {
            unlink($imagePath);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Xóa banner thành công.');
    }
}
