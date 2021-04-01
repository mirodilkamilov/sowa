<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyContactController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserAboutController;
use App\Http\Controllers\User\UserContactController;
use App\Http\Controllers\User\UserProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User routes
|--------------------------------------------------------------------------
*/


Route::get('/', function () {
    $defaultLang = config('app.default_language');
    $langInSession = session('language');
    $locale = isset($langInSession) ? $langInSession : $defaultLang;

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

    Route::resource('about', AboutController::class)->except(['create', 'show', 'store']);

    Route::resource('customers', CompanyContactController::class)->except(['show']);

    Route::resource('company-contacts', CompanyContactController::class)->except(['show']);

    Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');

});

require __DIR__ . '/auth.php';
