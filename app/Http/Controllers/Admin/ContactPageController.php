<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPage;

class ContactPageController extends Controller
{
    public function edit()
    {
        $contact = ContactPage::first();
        return view('admin.contact-page.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'nullable|email',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        // ✅ Get existing or create new
        $contact = ContactPage::first() ?? new ContactPage();

        // ✅ Update all fields
        $contact->update([
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'address' => $request->address,
            'map_iframe' => $request->map_iframe,

            // 🔥 Social Links
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        return back()->with('success', 'Contact Page Updated Successfully');
    }
}