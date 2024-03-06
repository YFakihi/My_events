<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\singlepageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/events', function () {
//     return view('events');
// })->middleware(['auth', 'verified'])->name('events');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/', [EventController::class, 'home'])->name('events.home');
Route::post('/singlepage/{id}', [EventController::class, 'show'])->name('events.show');


Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::post('/categories',[CategorieController::class, 'store'])->name('categories.store');



// Route::put('/singlepage', function () {
//     return view('events/singlepage');
// })->name('events.singlepage');

// Route::post('/singlepage',[singlepageController::class,'getid'])->name('events.getid');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
