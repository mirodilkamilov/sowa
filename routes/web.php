<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SlideController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $defaultLang = config('app.locale');
    $langInSession = session('language');

    $locale = isset($langInSession) ? $langInSession : $defaultLang;
    return redirect()->route('home.index', $locale);
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => implode('|', config('app.languages'))],
    'middleware' => 'homeSetLocale',
], function () {
    Route::get('/', [SlideController::class, 'index'])->name('home.index');

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

        Route::get('/{project}-{slug}', [ProjectController::class, 'show'])->name('projects.show');

        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');

        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    });

    Route::get('/about', [CompanyDetailController::class, 'index'])->name('about.index');

    Route::get('/contacts', function () {
        return view('contacts.index');
    })->name('contacts.index');

});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'dashboardSetLocale'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/slides', [DashboardController::class, 'slides'])->name('slides.index');

    Route::get('/categories', [DashboardController::class, 'categories'])->name('categories.index');

    Route::get('/projects', [DashboardController::class, 'projects'])->name('dashboard.projects.index');

    Route::get('/messages', [DashboardController::class, 'messages'])->name('about.messages.index');

    Route::get('/main-info', [DashboardController::class, 'mainInfo'])->name('about.main.index');

    Route::get('/customers', [DashboardController::class, 'customers'])->name('about.customers.index');

    Route::get('/contacts', [DashboardController::class, 'contacts'])->name('about.contacts.index');

    Route::get('/trash', [DashboardController::class, 'trash'])->name('trash.index');

});

require __DIR__ . '/auth.php';
