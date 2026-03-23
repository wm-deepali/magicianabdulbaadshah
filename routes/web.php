<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\GalleryVideoController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('/about-us', 'about')->name('about');

    Route::get('/contact-us', 'contact')->name('contact');

    Route::get('/gallery', 'gallery')->name('gallery');

    Route::get('/faq', 'faq')->name('faq');

    Route::get('/our-services', 'services')->name('services');

    Route::get('/packages', 'packages')->name('packages');

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

        Route::resource('gallery-images', GalleryImageController::class);
        Route::resource('gallery-videos', GalleryVideoController::class);

        Route::resource('packages', PackageController::class);

        Route::resource('services', ServiceController::class);

        Route::get('about-section', [AboutSectionController::class, 'edit'])->name('about.edit');
        Route::post('about-section', [AboutSectionController::class, 'update'])->name('about.update');

        Route::resource('faqs', FaqController::class)->names('faqs');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        Route::resource('hero', HeroSliderController::class)->names('hero');

        Route::get('/about-page', [AboutPageController::class, 'edit'])->name('about-page.edit');
        Route::post('/about-page', [AboutPageController::class, 'update'])->name('about-page.update');

        Route::get('contact-page', [ContactPageController::class, 'edit'])->name('contact-page.edit');
        Route::post('contact-page', [ContactPageController::class, 'update'])->name('contact-page.update');

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
