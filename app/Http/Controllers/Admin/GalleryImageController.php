<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    // List all images
    public function index()
    {
        $images = GalleryImage::latest()->get();
        return view('admin.gallery-images.index', compact('images'));
    }

    // Show create form
    public function create()
    {
        return view('admin.gallery-images.create');
    }

    // Store image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('gallery/images', 'public');

        GalleryImage::create([
            'title' => $request->title,
            'image' => $path,
        ]);

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('admin.gallery-images.edit', compact('image'));
    }

    // Update image
    public function update(Request $request, $id)
    {
        $image = GalleryImage::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }

            $path = $request->file('image')->store('gallery/images', 'public');
            $image->image = $path;
        }

        $image->title = $request->title;
        $image->save();

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image updated successfully');
    }

    // Delete image
    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);

        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image deleted successfully');
    }

    // (optional) Show single image
    public function show($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('admin.gallery-images.show', compact('image'));
    }
}