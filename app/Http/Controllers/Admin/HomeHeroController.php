<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeHero;
use Illuminate\Support\Facades\Storage;

class HomeHeroController extends Controller
{
    public function edit()
    {
        $hero = HomeHero::first();
        return view('admin.home_hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = HomeHero::first();

        $data = $request->only([
            'title',
            'subtitle',
            'button_text'
        ]);

        if ($request->hasFile('background_image')) {

            if ($hero && $hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }

            $data['background_image'] = $request->file('background_image')
                ->store('hero', 'public');
        }

        HomeHero::updateOrCreate(['id' => $hero->id ?? null], $data);

        return back()->with('success', 'Hero Updated');
    }

}
