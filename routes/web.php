<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyContactController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\User\AboutController as UserAboutController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProjectController as UserProjectController;
use App\Http\Controllers\User\UserPhoneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $defaultLang = config('app.default_language');
    $langInSession = session('language');
    $locale = $langInSession ?? $defaultLang;

    return redirect()->route('home.index', $locale);
});
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => implode('|', config('app.languages'))],
    'middleware' => 'homeSetLocale',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [UserProjectController::class, 'index'])->name('user.projects.index');
        Route::get('/{project}-{slug}', [UserProjectController::class, 'show'])->name('user.projects.show');
    });

    Route::get('/about', [UserAboutController::class, 'index'])->name('user.about.index');

    Route::resource('contacts', UserContactController::class)->only(['create', 'store']);
    Route::get('/contacts', function () {
        $locale = session('language') ?? config('app.default_language');
        return redirect()->route('contacts.create', $locale);
    });

    Route::resource('user-phone', UserPhoneController::class)->only('store');
});


/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'dashboardSetLocale'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('slides', SlideController::class)->except(['show']);

    Route::resource('categories', CategoryController::class)->except(['show', 'create']);

    Route::resource('projects', ProjectController::class)->except(['show']);

    // * Users contacts controller (messages)
    Route::resource('contacts', ContactController::class)->except(['create', 'show', 'store']);

    Route::resource('about', AboutController::class)->except(['show']);

    Route::resource('customers', CustomerController::class)->except(['show']);

    Route::resource('company-contacts', CompanyContactController::class)->except(['show']);

    Route::resource('social-media', SocialMediaController::class)->only(['store']);

    Route::resource('trash', TrashController::class)->only(['index', 'store']);
});

require __DIR__ . '/auth.php';
