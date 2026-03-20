<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MandalMember;
use App\Models\Mandal;
use Illuminate\Support\Facades\Storage;

class MandalMemberController extends Controller
{

    public function index()
    {
        $members = MandalMember::with('mandal')->latest()->get();

        return view('admin.mandal-members.index', compact('members'));
    }


    public function create()
    {
        $mandals = Mandal::where('status', 1)->get();

        return view('admin.mandal-members.create', compact('mandals'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'mandal_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('mandal-members', 'public');
        }

        MandalMember::create([
            'mandal_id' => $request->mandal_id,
            'photo' => $photo,
            'name' => $request->name,
            'designation' => $request->designation,
            'location' => $request->location,
            'since' => $request->since,
            'mobile' => $request->mobile,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-members.index')
            ->with('success', 'Member Added Successfully');
    }


    public function edit($id)
    {

        $member = MandalMember::findOrFail($id);

        $mandals = Mandal::where('status', 1)->get();

        return view('admin.mandal-members.edit', compact('member', 'mandals'));

    }


    public function update(Request $request, $id)
    {
        $member = MandalMember::findOrFail($id);

        $request->validate([
            'mandal_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);

        $photo = $member->photo;

        if ($request->hasFile('photo')) {

            // delete old photo
            if ($member->photo && Storage::disk('public')->exists($member->photo)) {
                Storage::disk('public')->delete($member->photo);
            }

            // upload new photo
            $photo = $request->file('photo')->store('mandal-members', 'public');
        }

        $member->update([
            'mandal_id' => $request->mandal_id,
            'photo' => $photo,
            'name' => $request->name,
            'designation' => $request->designation,
            'location' => $request->location,
            'since' => $request->since,
            'mobile' => $request->mobile,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'relation' => $request->relation,
            'contribution' => implode(',', $request->contribution ?? []),
            'message' => $request->message,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-members.index')
            ->with('success', 'Member Updated Successfully');
    }


    public function destroy($id)
    {

        MandalMember::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Member Deleted Successfully'
        ]);

    }

}