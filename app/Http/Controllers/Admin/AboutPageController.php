<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function edit()
    {
        $about = AboutPage::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutPage::first();

        if (!$about) {
            $about = new AboutPage();
        }

        // Image upload
        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $about->image = $request->file('image')->store('about', 'public');
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'story' => $request->story,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'years' => $request->years,
            'events' => $request->events,
            'button_text' => $request->button_text,
            'success_rate' => $request->success_rate,
        ]);

        $about->save();

        return back()->with('success', 'About Page Updated');
    }
}
