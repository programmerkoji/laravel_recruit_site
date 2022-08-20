<?php

use App\Http\Controllers\User\JobOffersController;
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

Route::get('/', [JobOffersController::class, 'index'])
    ->name('index');
Route::get('/job_offers/{job_offer}', [JobOffersController::class, 'show'])
    ->name('show');

// Route::get('/', function () {
//     return view('user.welcome');
// });

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
