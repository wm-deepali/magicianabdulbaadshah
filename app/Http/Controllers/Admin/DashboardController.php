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
        
        return view('admin.dashboard.index');
    }
}
