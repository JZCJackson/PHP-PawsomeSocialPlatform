<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::resource('events',\App\Http\Controllers\EventsController::class);
Route::resource('feed',\App\Http\Controllers\FeedController::class);
Route::resource('blogs',\App\Http\Controllers\BlogsController::class);
Route::resource('account',\App\Http\Controllers\PersonalProfileController::class);
Route::resource('photos',\App\Http\Controllers\PhotosController::class);
Route::resource('pets',\App\Http\Controllers\PetsController::class);
Route::resource('like',\App\Http\Controllers\LikeController::class);
Route::resource('comment',\App\Http\Controllers\CommentController::class);

Route::get('fileupload', [\App\Http\Controllers\PhotosController::class, 'uploadform']);
Route::post('fileupload', [\App\Http\Controllers\PhotosController::class, 'uploadpost']);
Route::get("search",[\App\Http\Controllers\SearchController::class,'search']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
