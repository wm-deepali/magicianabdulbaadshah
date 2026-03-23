<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\Contact;
use App\Models\Package;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'totalServices' => Service::count(),
            'totalPackages' => Package::count(),
            'totalContacts' => Contact::count(),
            'totalImages' => GalleryImage::count(),
            'recentContacts' => Contact::latest()->take(5)->get(),
        ]);
    }
}
