<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
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

Route::get('/', [EventController::class, 'ShowHome'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/addevent', [EventController::class, 'ShowAdd'])->name('addEvent');
Route::post('/addevent', [EventController::class, 'CreateEvent'])->name('event.create');

Route::get('/details/{id}', [EventController::class, 'details'])->name('details');

Route::get('/search', [EventController::class, 'searchEvents'])->name('search');

Route::get('/addticket/{id}', [TicketController::class, 'ShowAddTickets'])->name('addTicket');
Route::post('/addtickets', [TicketController::class, 'CreateTickets'])->name('tickets.create');

Route::post('/createreservation', [ReservationController::class, 'createReservation'])->name('createReservation');

Route::get('/category/{id}', [EventController::class, 'category'])->name('category');

Route::get('/myevents', [EventController::class, 'EventsUser'])->name('myevents');



require __DIR__ . '/auth.php';
