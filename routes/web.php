<?php

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
    return view('home.index');
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', function () {
        return view('projects.index');
    });

    Route::get('/{project_id}-{slug}', 'App\Http\Controllers\ProjectController@show');
});

Route::get('/about', function () {
    return view('about.index');
});

Route::get('/contacts', function () {
    return view('contacts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
