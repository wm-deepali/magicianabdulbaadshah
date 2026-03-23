<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::latest()->get();
        return view('admin.hero.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('hero', 'public');

        HeroSlider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $path,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Slide added successfully');
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('admin.hero.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {

            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $path = $request->file('image')->store('hero', 'public');
            $slider->image = $path;
        }

        $slider->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Slide updated successfully');
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return response()->json([
            'message' => 'Slide deleted successfully'
        ]);
    }
}