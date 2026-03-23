<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlider;

class HeroSliderSeeder extends Seeder
{
    public function run()
    {
        HeroSlider::truncate(); // optional (fresh start)

        HeroSlider::insert([
            [
                'title' => 'Make Your Party<br><span class="text-warning">MAGICAL</span> 🎉',
                'subtitle' => "India's Most Premium Theme Party Planner & Balloon Decoration",
                'image' => 'hero/demo1.jpg',
                'button_text' => 'Book Your Magic Now',
                'button_link' => '#contact',
            ],
            [
                'title' => 'Balloons that<br>Steal the Show ✨',
                'subtitle' => 'Custom Themes • Premium Balloons • Unforgettable Moments',
                'image' => 'hero/demo2.jpg',
                'button_text' => 'Choose Your Package',
                'button_link' => '#packages',
            ],
            [
                'title' => 'From 1st Birthday<br>to Grand Weddings',
                'subtitle' => 'Every celebration deserves magic!',
                'image' => 'hero/demo3.jpg',
                'button_text' => 'See Our Magic',
                'button_link' => '#gallery',
            ],
        ]);
    }
}