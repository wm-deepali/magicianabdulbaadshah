<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhySetting;
use App\Models\WhyBenefit;

class WhySettingController extends Controller
{
    /**
     * Show form
     */
    public function edit()
    {
        $data = WhySetting::first() ?? WhySetting::create([]);

        $benefits = WhyBenefit::orderBy('sort_order')->get();

        return view('admin.why.edit', compact('data', 'benefits'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $data = WhySetting::first() ?? new WhySetting();

        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
        ]);

        $data->fill($request->all());
        $data->save();

        return back()->with('success', 'Why Page Updated Successfully!');
    }

    /**
     * Store Benefit
     */
    public function storeBenefit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        WhyBenefit::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'type' => $request->type,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return back()->with('success', 'Benefit Added Successfully');
    }

    /**
     * Delete Benefit
     */
    public function deleteBenefit($id)
    {
        WhyBenefit::findOrFail($id)->delete();

        return back()->with('success', 'Benefit Deleted Successfully');
    }

    public function updateBenefit(Request $request)
    {
        $benefit = WhyBenefit::findOrFail($request->id);

        $benefit->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'type' => $request->type,
            'sort_order' => $request->sort_order,
        ]);

        return back()->with('success', 'Benefit Updated Successfully');
    }
}