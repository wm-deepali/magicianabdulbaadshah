<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AboutSection;
use App\Models\Contact;
use App\Models\ContactPage;
use App\Models\Faq;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use App\Models\HeroSlider;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(Request $request)
    {
        $faqs = Faq::where('status', 1)
            ->where('show_home', 1)
            ->latest()
            ->get();

        $videos = GalleryVideo::latest()->get();

        $images = GalleryImage::latest()->get();

        $packages = Package::get();

        $services = Service::latest()->get();

        $about = AboutSection::first();

        $sliders = HeroSlider::latest()->get();

        return view('front-pages.home', compact(
            'faqs',
            'videos',
            'images',
            'packages',
            'services',
            'about',
            'sliders'
        ));
    }

    public function about()
    {
        $about = AboutPage::first();
        return view('front-pages.about-us', compact('about'));
    }


    public function contact()
    {
        $contact = ContactPage::first();
        $services = Service::all();

        return view('front-pages.contact-us', compact('contact', 'services'));
    }

    public function gallery()
    {
        $images = GalleryImage::latest()->get();
        $videos = GalleryVideo::latest()->get();
        return view('front-pages.gallery', compact('images', 'videos'));
    }

    public function faq()
    {
        $faqs = Faq::where('status', 1)->get();

        return view('front-pages.faq', compact('faqs'));
    }

    public function services()
    {
        $services = Service::latest()->get();
        return view('front-pages.our-service', compact('services'));

    }

    public function packages()
    {
        $packages = Package::latest()->get();
        return view('front-pages.packages', compact('packages'));
    }


    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'service_id' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your enquiry has been sent!');
    }

}