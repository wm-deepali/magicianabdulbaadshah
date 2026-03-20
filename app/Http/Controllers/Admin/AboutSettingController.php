<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSetting;
use Illuminate\Support\Facades\Storage;

class AboutSettingController extends Controller
{
    /**
     * Show form
     */
    public function edit()
    {
        $data = AboutSetting::first();

        if (!$data) {
            $data = AboutSetting::create([]);
        }

        return view('admin.about.edit', compact('data'));
    }

    /**
     * Update data
     */
    public function update(Request $request)
    {
        $data = AboutSetting::first();

        if (!$data) {
            $data = new AboutSetting();
        }

        // ✅ Validation (like ListingController)
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'founder_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /**
         * =========================
         * About Image Upload
         * =========================
         */
        if ($request->hasFile('about_image')) {

            // delete old image
            if ($data->about_image && Storage::disk('public')->exists($data->about_image)) {
                Storage::disk('public')->delete($data->about_image);
            }

            $file = $request->file('about_image');

            $filename = 'about_' . time() . '.' . $file->extension();

            $data->about_image = $file->storeAs('about', $filename, 'public');
        }

        /**
         * =========================
         * Founder Image Upload
         * =========================
         */
        if ($request->hasFile('founder_image')) {

            if ($data->founder_image && Storage::disk('public')->exists($data->founder_image)) {
                Storage::disk('public')->delete($data->founder_image);
            }

            $file = $request->file('founder_image');

            $filename = 'founder_' . time() . '.' . $file->extension();

            $data->founder_image = $file->storeAs('about', $filename, 'public');
        }

        /**
         * =========================
         * Save Text Fields
         * =========================
         */
        $data->fill($request->except(['about_image', 'founder_image']));

        $data->save();

        return redirect()->back()->with('success', 'About Page Updated Successfully!');
    }
}