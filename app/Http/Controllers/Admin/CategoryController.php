<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Generate slug
        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Upload image
        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->extension();

            $imageName = $file->storeAs('categories', $filename, 'public');
        }


        Category::create([

            'name' => $request->name,

            'slug' => $slug,

            'image' => $imageName,

            'is_popular' => $request->is_popular ? 1 : 0,

            'status' => $request->status ? 1 : 0,

            'show_header' => $request->show_header ? 1 : 0,

            'show_footer' => $request->show_footer ? 1 : 0,

        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Successfully');

    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Generate slug
        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }


        $imageName = $category->image;

        if ($request->hasFile('image')) {

            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $file = $request->file('image');

            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->extension();

            $imageName = $file->storeAs('categories', $filename, 'public');
        }



        $category->update([

            'name' => $request->name,

            'slug' => $slug,

            'image' => $imageName,

            'is_popular' => $request->is_popular ? 1 : 0,

            'status' => $request->status ? 1 : 0,

            'show_header' => $request->show_header ? 1 : 0,

            'show_footer' => $request->show_footer ? 1 : 0,

        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');

    }


    public function destroy($id)
    {

        $category = Category::findOrFail($id);

        // Delete image
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category Deleted Successfully'
        ]);

    }

}