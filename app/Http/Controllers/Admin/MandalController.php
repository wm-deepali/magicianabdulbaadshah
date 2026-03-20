<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mandal;
use Illuminate\Support\Str;

class MandalController extends Controller
{

    public function index()
    {
        $mandals = Mandal::latest()->get();

        return view('admin.mandals.index', compact('mandals'));
    }

    public function create()
    {
        return view('admin.mandals.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:mandals'
        ]);

        $slug = Str::slug($request->name);

        if(empty($slug)){
            $slug = str_replace(' ','-',$request->name);
        }

        Mandal::create([

            'name' => $request->name,

            'slug' => $slug,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()->route('admin.mandals.index')
            ->with('success','Mandal Created Successfully');

    }

    public function edit($id)
    {
        $mandal = Mandal::findOrFail($id);

        return view('admin.mandals.edit', compact('mandal'));
    }

    public function update(Request $request,$id)
    {

        $mandal = Mandal::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:mandals,name,'.$id
        ]);

        $slug = Str::slug($request->name);

        if(empty($slug)){
            $slug = str_replace(' ','-',$request->name);
        }

        $mandal->update([

            'name' => $request->name,

            'slug' => $slug,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()->route('admin.mandals.index')
            ->with('success','Mandal Updated Successfully');

    }

    public function destroy($id)
    {

        Mandal::findOrFail($id)->delete();

        return response()->json([
            'message'=>'Mandal Deleted Successfully'
        ]);

    }

}