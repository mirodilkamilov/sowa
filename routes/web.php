<?php

use App\Http\Controllers\CategoryController;
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
    return redirect('/' . $locale);
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => implode('|', config('app.languages'))],
    'middleware' => 'setLocale',
], function () {
    Route::get('/', [SlideController::class, 'index'])->name('home.index');

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

        Route::get('/{id}-{slug}', [ProjectController::class, 'show'])->name('projects.show');

        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');

        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    });

    Route::get('/about', function () {
        return view('about.index');
    })->name('about.index');

    Route::get('/contacts', function () {
        return view('contacts.index');
    })->name('contacts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
