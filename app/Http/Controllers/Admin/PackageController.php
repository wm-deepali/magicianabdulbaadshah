<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'features' => 'required|array',
        ]);

        Package::create([
            'title' => $request->title,
            'price' => $request->price,
            'features' => array_values(array_filter($request->features)),
            'is_popular' => $request->has('is_popular'),
            'button_text' => $request->button_text,
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package created successfully');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'features' => 'required|array',
        ]);

        $package->update([
            'title' => $request->title,
            'price' => $request->price,
            'features' => array_values(array_filter($request->features)),
            'is_popular' => $request->has('is_popular'),
            'button_text' => $request->button_text,
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return response()->json([
            'message' => 'Package deleted successfully'
        ]);
    }
}