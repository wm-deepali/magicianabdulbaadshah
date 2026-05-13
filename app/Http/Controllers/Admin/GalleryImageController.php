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
        'titles.*' => 'nullable|string|max:255',
        'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $index => $image) {

            $path = $image->store('gallery/images', 'public');

            GalleryImage::create([
                'title' => $request->titles[$index] ?? null,
                'image' => $path,
            ]);
        }
    }

    return redirect()
        ->route('admin.gallery-images.index')
        ->with('success', 'Images added successfully');
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

    // DELETE IMAGE FROM STORAGE
    if ($image->image && Storage::disk('public')->exists($image->image)) {

        Storage::disk('public')->delete($image->image);
    }

    // DELETE RECORD
    $image->delete();

    return response()->json([
        'status' => true,
        'message' => 'Image deleted successfully'
    ]);
}

    // (optional) Show single image
    public function show($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('admin.gallery-images.show', compact('image'));
    }
}