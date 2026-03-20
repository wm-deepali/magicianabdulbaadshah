<?php

use App\Http\Controllers\Admin\AboutSettingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\HomeIntroController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\MandalController;
use App\Http\Controllers\Admin\MandalMemberController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\WhySettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('/search-listings', 'searchListings')->name('search.listings');

    Route::get('/about-us', 'about')->name('about');

    Route::get('/contact-us', 'contact')->name('contact');

    Route::get('/faq', 'faq')->name('faq');

    Route::get('/blogs', 'blogs')->name('blogs');

    Route::get('/blog/{slug}', 'blogDetail')->name('blog.detail');

    Route::get('/listing', 'listing')->name('listing');

    Route::get('/listing/{id}', 'listingDetail')->name('listing.show');

    Route::get('/page/{slug}', 'pages')->name('page.show');

    Route::get('/mandal-members', 'mandalMembers')->name('mandal.members');

    Route::get('/member-enquiry', 'memberEnquiry')->name('member.enquiry');

    Route::get('/why-us', 'whyUs')->name('why.us');

    Route::post('/submit-listing', 'submitListing')->name('listing.submit');

    Route::post('/member-enquiry', 'submitMandalMember')->name('member.enquiry.store');

    Route::post('/contact-submit', 'submitContact')->name('contact.submit');

});

// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profile-setting', ProfileSettingController::class);
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');

        Route::resource('locations', LocationController::class);

        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class)->names('subcategories');

        Route::resource('mandals', MandalController::class)->names('mandals');

        Route::resource('listings', ListingController::class);
        Route::get('get-subcategories/{category_id}', [ListingController::class, 'getSubCategories'])->name('get.subcategories');

        Route::resource('mandal-members', MandalMemberController::class)->names('mandal-members');

        Route::resource('faqs', FaqController::class)->names('faqs');

        Route::resource('blogs', BlogController::class)->names('blogs');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('about-settings', [AboutSettingController::class, 'edit'])->name('about.edit');
        Route::post('about-settings', [AboutSettingController::class, 'update'])->name('about.update');

        Route::get('why-settings', [WhySettingController::class, 'edit'])->name('why.edit');
        Route::post('why-settings', [WhySettingController::class, 'update'])->name('why.update');
        Route::post('why-benefit/store', [WhySettingController::class, 'storeBenefit'])->name('why.benefit.store');
        Route::get('why-benefit/delete/{id}', [WhySettingController::class, 'deleteBenefit'])->name('why.benefit.delete');
        Route::post('why-benefit-update', [WhySettingController::class, 'updateBenefit'])->name('why.benefit.update');

        Route::resource('pages', PageController::class);

        Route::get('home-intro', [HomeIntroController::class, 'edit'])->name('home-intro.edit');
        Route::post('home-intro', [HomeIntroController::class, 'update'])->name('home-intro.update');

        Route::get('admin/home-hero', [HomeHeroController::class, 'edit'])->name('home-hero.edit');
        Route::post('admin/home-hero', [HomeHeroController::class, 'update'])->name('home-hero.update');

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
