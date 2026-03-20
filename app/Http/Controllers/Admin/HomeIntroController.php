<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeIntroController extends Controller
{
    /**
     * Edit Page
     */
    public function edit()
    {
        $intro = HomeSection::first();

        return view('admin.home_intro.edit', compact('intro'));
    }

    /**
     * Update
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $intro = HomeSection::first();

        if (!$intro) {
            $intro = new HomeSection();
        }

        $intro->title = $request->title;
        $intro->description = $request->description;
        $intro->stat_1 = $request->stat_1;
        $intro->stat_1_label = $request->stat_1_label;
        $intro->stat_2 = $request->stat_2;
        $intro->stat_2_label = $request->stat_2_label;
        $intro->stat_3 = $request->stat_3;
        $intro->stat_3_label = $request->stat_3_label;

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('home', 'public');
            $intro->image = $image;
        }

        $intro->save();

        return back()->with('success', 'Introduction updated successfully!');
    }
}