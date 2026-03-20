<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug',
            'content' => 'required',
        ]);

        // Generate slug safely
        $slug = $request->slug
            ? $this->generateSlug($request->slug)
            : $this->generateSlug($request->menu_name);

        Page::create([
            'menu_name' => $request->menu_name,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'content' => $request->content,
            'status' => $request->has('status'),
            'show_in_menu' => $request->has('show_in_menu'),
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page Created Successfully');
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'menu_name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug,' . $id,
            'content' => 'required',
        ]);

        // Generate slug safely
        $slug = $request->slug
            ? $this->generateSlug($request->slug)
            : $this->generateSlug($request->menu_name);

        $page->update([
            'menu_name' => $request->menu_name,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'content' => $request->content,
            'status' => $request->has('status'),
            'show_in_menu' => $request->has('show_in_menu'),
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page Updated Successfully');
    }

    /**
     * DELETE (AJAX)
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json([
            'status' => true,
            'message' => 'Page Deleted Successfully'
        ]);
    }

    function generateSlug($text)
    {
        // Convert to lowercase
        $text = strtolower($text);

        // Replace spaces with dash
        $text = preg_replace('/\s+/u', '-', $text);

        // Remove special chars but keep unicode (Hindi)
        $text = preg_replace('/[^\p{L}\p{N}\-]+/u', '', $text);

        return trim($text, '-');
    }
}