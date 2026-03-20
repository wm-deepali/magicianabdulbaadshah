<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Contact;
use App\Models\MandalMember;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Listings
        $totalListings = Listing::count();

        // Today Listings
        $todayListings = Listing::whereDate('created_at', Carbon::today())->count();

        // Total Enquiries
        $totalEnquiries = Contact::count();

        // Today Enquiries
        $todayEnquiries = Contact::whereDate('created_at', Carbon::today())->count();

        // Active Members
        $activeMembers = MandalMember::where('status', 1)->count();

        // Today New Members
        $todayMembers = MandalMember::whereDate('created_at', Carbon::today())->count();

        // Last 7 Days Enquiries (FIXED)
        $recentEnquiries = Contact::where('created_at', '>=', Carbon::now()->subDays(7))
            ->latest()
            ->take(10)
            ->get();

        // Pending Mandal Requests (IMPORTANT)
        $mandalRequests = MandalMember::with('mandal')
            ->where('status', 0) // 0 = pending
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalListings',
            'todayListings',
            'totalEnquiries',
            'todayEnquiries',
            'activeMembers',
            'todayMembers',
            'recentEnquiries',
            'mandalRequests'
        ));
    }
}
