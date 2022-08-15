<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\Controller;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile', [PersonController::class, 'index']);
Route::get('/profile/show_all', [PersonController::class, 'showAll']);
Route::post('/profile/sort', [PersonController::class, 'showSort']);
// Route::get('/profile/gender/{gender}/{state}', [PersonController::class, 'sortGender'])
//     ->name('sort.gender');

// Route::get('/profile/age/', [PersonController::class, 'sortAge'])
//     ->name('sort.age');

// Route::get('/profile/height/', [PersonController::class, 'sortHeight'])
//     ->name('sort.height');

// Route::get('/profile/income/', [PersonController::class, 'sortIncome'])
//     ->name('sort.income');


