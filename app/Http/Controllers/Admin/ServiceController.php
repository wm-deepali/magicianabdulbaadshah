<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Upload Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        // Handle Features
        $features = $request->features
            ? explode(',', $request->features)
            : [];

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'image' => $imagePath,
            'features' => $features,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service added successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Upload new image (delete old)
        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $service->image = $request->file('image')->store('services', 'public');
        }

        // Handle Features
        $features = $request->features
            ? explode(',', $request->features)
            : [];

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'image' => $service->image,
            'features' => $features,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}