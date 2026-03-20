<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::with([
            'location',
            'category',
            'subcategory'
        ])->latest()->get();

        return view('admin.listings.index', compact('listings'));
    }


    public function create()
    {
        $locations = Location::get();

        $categories = Category::where('status', 1)->get();

        return view('admin.listings.create', compact(
            'locations',
            'categories'
        ));
    }


    public function store(Request $request)
    {

        $request->validate([

            'location_id' => 'required',

            'category_id' => 'required',

            'business_name' => 'required',

            'mobile' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = Str::slug($request->business_name) . '-' . time() . '.' . $file->extension();

            $imageName = $file->storeAs('listings', $filename, 'public');
        }

        // LOGO
        $logoName = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = Str::slug($request->business_name) . '-logo-' . time() . '.' . $file->extension();
            $logoName = $file->storeAs('listings', $filename, 'public');
        }

        Listing::create([

            'location_id' => $request->location_id,

            'category_id' => $request->category_id,

            'sub_category_id' => $request->sub_category_id,

            'business_name' => $request->business_name,

            'address' => $request->address,

            'mobile' => $request->mobile,

            'email' => $request->email,

            'whatsapp' => $request->whatsapp,

            'short_description' => $request->short_description,

            'services' => $request->services,

            'working_hours' => $request->working_hours,

            'closed_days' => $request->closed_days,

            'website' => $request->website,

            'image' => $imageName,

            'logo' => $logoName,

            'status' => $request->status ? 1 : 0

        ]);


        return redirect()->route('admin.listings.index')
            ->with('success', 'Listing Created Successfully');

    }


    public function edit($id)
    {

        $listing = Listing::findOrFail($id);

        $locations = Location::get();

        $categories = Category::where('status', 1)->get();

        $subcategories = SubCategory::where(
            'category_id',
            $listing->category_id
        )->get();

        return view('admin.listings.edit', compact(

            'listing',
            'locations',
            'categories',
            'subcategories'

        ));

    }


    public function update(Request $request, $id)
    {

        $listing = Listing::findOrFail($id);

        $request->validate([

            'location_id' => 'required',

            'category_id' => 'required',

            'business_name' => 'required',

            'mobile' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        // IMAGE
        $imageName = $listing->image;

        if ($request->hasFile('image')) {

            if ($listing->image && Storage::disk('public')->exists($listing->image)) {
                Storage::disk('public')->delete($listing->image);
            }

            $file = $request->file('image');
            $filename = Str::slug($request->business_name) . '-img-' . time() . '.' . $file->extension();
            $imageName = $file->storeAs('listings', $filename, 'public');
        }

        // LOGO
        $logoName = $listing->logo;

        if ($request->hasFile('logo')) {

            if ($listing->logo && Storage::disk('public')->exists($listing->logo)) {
                Storage::disk('public')->delete($listing->logo);
            }

            $file = $request->file('logo');
            $filename = Str::slug($request->business_name) . '-logo-' . time() . '.' . $file->extension();
            $logoName = $file->storeAs('listings', $filename, 'public');
        }

        $listing->update([

            'location_id' => $request->location_id,

            'category_id' => $request->category_id,

            'sub_category_id' => $request->sub_category_id,

            'business_name' => $request->business_name,

            'address' => $request->address,

            'mobile' => $request->mobile,

            'email' => $request->email,

            'whatsapp' => $request->whatsapp,

            'short_description' => $request->short_description,

            'services' => $request->services,

            'working_hours' => $request->working_hours,

            'closed_days' => $request->closed_days,

            'website' => $request->website,

            'logo' => $logoName,

            'image' => $imageName,

            'status' => $request->status ? 1 : 0

        ]);


        return redirect()->route('admin.listings.index')
            ->with('success', 'Listing Updated Successfully');

    }


    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        if ($listing->image && Storage::disk('public')->exists($listing->image)) {
            Storage::disk('public')->delete($listing->image);
        }

        if ($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        
        $listing->delete();

        return response()->json([
            'message' => 'Listing Deleted Successfully'
        ]);
    }

    // AJAX Sub Categories

    public function getSubCategories($category_id)
    {

        $subcategories = SubCategory::where(
            'category_id',
            $category_id
        )->get();

        $html = '<option value="">Select Sub Category</option>';

        foreach ($subcategories as $sub) {

            $html .= '<option value="' . $sub->id . '">' . $sub->name . '</option>';

        }

        return $html;

    }

}