<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryVideo;

class GalleryVideoController extends Controller
{
    // List videos
    public function index()
    {
        $videos = GalleryVideo::latest()->get();
        return view('admin.gallery-videos.index', compact('videos'));
    }

    // Create form
    public function create()
    {
        return view('admin.gallery-videos.create');
    }

    // Store video
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'video' => 'required|url',
        ]);

        GalleryVideo::create([
            'title' => $request->title,
            'video' => $request->video,
        ]);

        return redirect()->route('admin.gallery-videos.index')
            ->with('success', 'Video added successfully');
    }

    // Edit form
    public function edit($id)
    {
        $video = GalleryVideo::findOrFail($id);
        return view('admin.gallery-videos.edit', compact('video'));
    }

    // Update video
    public function update(Request $request, $id)
    {
        $video = GalleryVideo::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'video' => 'required|url',
        ]);

        $video->update([
            'title' => $request->title,
            'video' => $request->video,
        ]);

        return redirect()->route('admin.gallery-videos.index')
            ->with('success', 'Video updated successfully');
    }

    // Delete video
    public function destroy($id)
    {
        $video = GalleryVideo::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.gallery-videos.index')
            ->with('success', 'Video deleted successfully');
    }

    // Show single video
    public function show($id)
    {
        $video = GalleryVideo::findOrFail($id);
        return view('admin.gallery-videos.show', compact('video'));
    }
}