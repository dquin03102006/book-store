<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutPageController extends Controller
{
    public function edit()
    {
        $about = AboutPage::first();

        if (!$about) {
            $about = AboutPage::create([]);
        }

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_label' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'story_label' => 'required|string|max:255',
            'story_title' => 'required|string|max:255',
            'story_content' => 'nullable|string',

            'values_label' => 'required|string|max:255',
            'values_title' => 'required|string|max:255',
            'values_description' => 'nullable|string',

            'value1_title' => 'required|string|max:255',
            'value1_content' => 'nullable|string',
            'value2_title' => 'required|string|max:255',
            'value2_content' => 'nullable|string',
            'value3_title' => 'required|string|max:255',
            'value3_content' => 'nullable|string',

            'section_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'info1_label' => 'required|string|max:255',
            'info1_value' => 'required|string|max:255',
            'info2_label' => 'required|string|max:255',
            'info2_value' => 'required|string|max:255',
            'info3_label' => 'required|string|max:255',
            'info3_value' => 'required|string|max:255',
            'info4_label' => 'required|string|max:255',
            'info4_value' => 'required|string|max:255',
        ]);

        $about = AboutPage::firstOrCreate([]);

        foreach (['hero_image', 'section_image'] as $field) {
            if ($request->hasFile($field)) {
                $directory = public_path('images/about');

                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                $oldImage = $about->$field;

                $filename = uniqid() . '.' . $request->file($field)->extension();

                $request->file($field)->move($directory, $filename);

                $validated[$field] = $filename;

                if ($oldImage && File::exists($directory . '/' . basename($oldImage))) {
                    File::delete($directory . '/' . basename($oldImage));
                }
            }
        }

        $about->update($validated);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'Cập nhật trang Giới thiệu thành công!');
    }
}
