<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit()
    {
        $setting = Setting::first();

        if(!$setting){
            $setting = Setting::create([]);
        }

        return view('admin.settings.edit', compact('setting'));
    }


    public function update(Request $request)
    {

        $setting = Setting::first();

        $setting->update([

            'address' => $request->address,
            'phone' => $request->phone,
            'support_phone' => $request->support_phone,
            'email' => $request->email,
            'support_email' => $request->support_email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'google_map' => $request->google_map

        ]);

        return back()->with('success','Settings updated successfully');

    }

}