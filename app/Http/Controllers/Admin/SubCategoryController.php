<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();

        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);

        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        SubCategory::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => $slug,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub Category Created Successfully');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $categories = Category::where('status', 1)->get();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $subcategory = SubCategory::findOrFail($id);

        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        $subcategory->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => $slug,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub Category Updated Successfully');

    }

    public function destroy($id)
    {

        SubCategory::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Sub Category Deleted Successfully'
        ]);

    }

}