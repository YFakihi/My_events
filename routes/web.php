<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\event_by_idController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\singlepageController;
use App\Http\Controllers\TickitController;
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
    return view('layouts/app');
})->name('dashboard');


Route::get('/dashboard_orginased', function () {
    return view('dashboard_orginased');
})->name('dashboard_orginased');
// middleware(['auth', 'verified'])->

Route::get('/profile/events_by_id', [event_by_idController::class, 'index'])->name('events_by_id.index');




// Route::get('/events', function () {
//     return view('events');
// })->middleware(['auth', 'verified'])->name('events');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/', [EventController::class, 'home'])->name('events.home');
Route::get('/singlepage/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/singlepage/{id}', [EventController::class, 'show'])->name('events.show');

Route::patch('/events/{id}/accept', [EventController::class,'accept'])->name('events.accept');
Route::patch('/events/{id}/reject', [EventController::class, 'reject'])->name('events.reject');

Route::get('/search', [EventController::class, 'filter'])->name('index.filter');


Route::get('/profile/tickits', function () {
    return view('profile.tickits');
})->name('tickits');



Route::patch('/tickets/{id}/accept', [TickitController::class, 'accept'])->name('tickets.accept');
Route::patch('/tickets/{id}/refuse', [TickitController::class, 'refuse'])->name('tickets.refuse');






Route::group(['middleware' => ['auth']], function () {


    Route::get('/profile/tickits' , [TickitController::class,'index'])->name('tickit.index');
    Route::post('/events/{eventId}/book', [TickitController::class,'bookNow'])->name('events.bookNow');
});





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
