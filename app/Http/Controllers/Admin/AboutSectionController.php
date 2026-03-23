<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;


class AboutSectionController extends Controller
{

    public function edit()
    {
        $about = AboutSection::first();
        return view('admin.home-about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $about = AboutSection::first();

        if (!$about) {
            $about = new AboutSection();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('about', 'public');
            $about->image = $path;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->experience_years = $request->experience_years;
        $about->clients = $request->clients;
        $about->events = $request->events;
        $about->button_text = $request->button_text;

        $about->save();

        return back()->with('success', 'About updated successfully');
    }
}
