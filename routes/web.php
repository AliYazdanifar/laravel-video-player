<?php

use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Jobs\ProcessVideo;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');

Route::post('videos', [VideoController::class, 'store'])->name('videos.store');

Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');

Route::post('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');

Route::get('/categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])->name('categories.videos.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';


Route::get('email', function () {
    Mail::to('ali.yazdani324@gmail.com')->send(new VerifyEmail());
//    ProcessVideo::dispatch();
});
