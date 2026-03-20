<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Mandal;
use App\Models\MandalMember;
use App\Models\Page;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\WhyBenefit;
use App\Models\WhySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function home(Request $request)
    {
        $query = Listing::with(['category', 'location'])
            ->where('status', 1);

        // location filter
        if ($request->location) {
            $query->where('location_id', $request->location);
        }

        $listings = $query->latest()
            ->take(4)
            ->get();

        $faqs = Faq::where('status', 1)
            ->where('show_home', 1)
            ->latest()
            ->get();

        $popularCategories = Category::withCount('listings')
            ->where('is_popular', 1)
            ->where('status', 1)
            ->take(6)
            ->get();

        $categories = Category::where('status', 1)->get();

        $locations = Location::get();
        $homeSection = \App\Models\HomeSection::first();
        $hero = \App\Models\HomeHero::first();

        return view('front-pages.home', compact('listings', 'faqs', 'categories', 'popularCategories', 'locations', 'homeSection','hero'));
    }

    public function searchListings(Request $request)
    {
        $search = $request->search;

        $listings = Listing::where('business_name', 'LIKE', "%{$search}%")
            ->where('status', 1)
            ->take(5)
            ->get(['id', 'business_name']);

        return response()->json($listings);
    }

    public function about()
    {
        $about = AboutSetting::first();
        return view('front-pages.about-us', compact('about'));
    }


    public function contact()
    {
        $settings = Setting::first();

        return view('front-pages.contact-us', compact('settings'));
    }

    public function faq()
    {
        $faqs = Faq::where('status', 1)->get();

        return view('front-pages.faq', compact('faqs'));
    }

    public function listing(Request $request)
    {
        $categories = Category::where('status', 1)
            ->withCount('listings')
            ->get();

        $locations = Location::get();

        $subcategories = collect(); // default empty

        $query = Listing::with(['category', 'location', 'subcategory'])
            ->where('status', 1);

        // Category filter
        if ($request->category) {

            $category = Category::where('slug', $request->category)->first();

            if ($category) {

                // get subcategories of selected category
                $subcategories = SubCategory::where('category_id', $category->id)
                    ->where('status', 1)
                    ->get();

                $query->where('category_id', $category->id);
            }
        }

        // Subcategory filter
        if ($request->subcategory) {

            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('slug', $request->subcategory);
            });
        }

        // Location filter
        if ($request->location) {
            $query->where('location_id', $request->location);
        }

        // Sorting
        if ($request->sort == 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->sort == 'verified') {
            $query->orderBy('status', 'desc');
        } else {
            $query->latest();
        }

        $listings = $query->paginate(6)->withQueryString();

        return view('front-pages.listing', compact(
            'categories',
            'locations',
            'subcategories',
            'listings'
        ));
    }

    public function pages($slug)
    {
        $page = Page::where('slug', urldecode($slug))
            ->where('status', 1)
            ->firstOrFail();
        return view('front-pages.page', compact('page'));
    }

    public function mandalMembers()
    {
        $mandals = Mandal::where('status', 1)
            ->withCount('members')
            ->get();

        $members = MandalMember::with('mandal')
            ->where('status', 1)
            ->get();

        return view('front-pages.mandal-members', compact(
            'mandals',
            'members'
        ));
    }

    public function memberEnquiry()
    {
        $mandals = Mandal::where('status', 1)->get();
        return view('front-pages.member-enquiry', compact('mandals'));
    }

    public function whyUs()
    {
        $data = WhySetting::first();

        $shopkeeperBenefits = WhyBenefit::where('type', 'shopkeeper')
            ->orderBy('sort_order')
            ->get();

        $customerBenefits = WhyBenefit::where('type', 'customer')
            ->orderBy('sort_order')
            ->get();

        return view('front-pages.why-us', compact(
            'data',
            'shopkeeperBenefits',
            'customerBenefits'
        ));
    }


    public function blogs()
    {
        $blogs = Blog::where('status', 1)
            ->latest()
            ->paginate(6);

        return view('front-pages.blogs', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('front-pages.blog-detail', compact('blog'));
    }

    public function submitListing(Request $request)
    {

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()->withErrors(['captcha' => 'Captcha verification failed']);
        }

        $request->validate([
            'business_name' => 'required',
            'mobile' => 'required',
            'category_id' => 'required',
            'short_description' => 'required'
        ]);

        Listing::create([
            'location_id' => $request->location_id ?? 1,
            'category_id' => $request->category_id,
            'business_name' => $request->business_name,
            'mobile' => $request->mobile,
            'short_description' => $request->short_description,
            'status' => 0 // pending approval
        ]);

        return back()->with('success', 'आपकी लिस्टिंग सफलतापूर्वक भेज दी गई है। एडमिन अप्रूवल के बाद यह लाइव हो जाएगी।');
    }


    public function submitContact(Request $request)
    {

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()->withErrors(['captcha' => 'Captcha verification failed']);
        }

        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return back()->with('success', 'आपका संदेश सफलतापूर्वक भेज दिया गया है।');
    }

    public function submitMandalMember(Request $request)
    {

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()->withErrors(['captcha' => 'Captcha verification failed']);
        }

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|digits:10',
            'mandal_id' => 'required'
        ]);

        MandalMember::create([

            'mandal_id' => $request->mandal_id,

            'name' => $request->name,

            'mobile' => $request->mobile,

            'whatsapp' => $request->mobile,

            'email' => $request->email,

            'relation' => $request->relation,

            'contribution' => implode(',', $request->contribution ?? []),

            'message' => $request->message,

            'status' => 0 // pending approval

        ]);

        return back()->with('success', 'धन्यवाद! आपकी रुचि दर्ज हो गई है। हम जल्द संपर्क करेंगे।');
    }

    public function listingDetail($id)
    {
        $listing = Listing::with(['category', 'subcategory', 'location'])
            ->findOrFail($id);

        return view('front-pages.listing_detail', compact('listing'));
    }

}