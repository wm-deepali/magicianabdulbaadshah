<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required'
        ]);

        if ($request->is_default) {
            Location::where('is_default', 1)->update(['is_default' => 0]);
        }

        Location::create([
            'location' => $request->location,
            'is_popular' => $request->is_popular ? 1 : 0,
            'is_default' => $request->is_default ? 1 : 0
        ]);

        return redirect()->route('admin.locations.index')
            ->with('success', 'Location Added Successfully');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required'
        ]);

        $location = Location::findOrFail($id);

        if ($request->is_default) {
            Location::where('is_default', 1)->update(['is_default' => 0]);
        }

        $location->update([
            'location' => $request->location,
            'is_popular' => $request->is_popular ? 1 : 0,
            'is_default' => $request->is_default ? 1 : 0
        ]);

        return redirect()->route('admin.locations.index')
            ->with('success', 'Location Updated Successfully');
    }
    
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return response()->json([
            'status' => true,
            'message' => 'Location Deleted Successfully'
        ]);
    }
}