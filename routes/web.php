<?php

use App\Http\Controllers\ProjectController;
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

    Route::get('/', [ProjectController::class, 'index']);

    Route::get('/{project_id}-{slug}', [ProjectController::class, 'show']);

    Route::get('/create', [ProjectController::class, 'create']);

    Route::post('/store', [ProjectController::class, 'store']);

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
