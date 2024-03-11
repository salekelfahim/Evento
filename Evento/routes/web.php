<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
Route::get('/details/{id}', [EventController::class, 'details'])->name('details');
Route::get('/search', [EventController::class, 'searchEvents'])->name('search');
Route::get('/category/{id}', [EventController::class, 'category'])->name('category');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/createreservation', [ReservationController::class, 'createReservation'])->name('createReservation');
    Route::get('/myreservations', [ReservationController::class, 'ShowReservations'])->name('myreservations');
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generatePDF');
});

Route::middleware('organisateur')->group(function () {
    Route::get('/addevent', [EventController::class, 'ShowAdd'])->name('addEvent');
    Route::post('/addevent', [EventController::class, 'CreateEvent'])->name('event.create');

    Route::get('/addticket/{id}', [TicketController::class, 'ShowAddTickets'])->name('addTicket');
    Route::post('/addtickets', [TicketController::class, 'CreateTickets'])->name('tickets.create');

    Route::get('/myevents', [EventController::class, 'EventsUser'])->name('myevents');
    Route::get('/myeventstats/{id}', [EventController::class, 'EventUserStats'])->name('myeventstats');

    Route::post('/acceptTicket/{reservation}', [TicketController::class, 'acceptTicket'])->name('acceptTicket');
    Route::post('/refuseTicket/{reservation}', [TicketController::class, 'refuseTicket'])->name('refuseTicket');
});


Route::middleware(['role:admin'])->group(function () {
    Route::get('/addcategory', [CategoryController::class, 'ShowCategory'])->name('addcategory');
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::post('/addnewcategory', [CategoryController::class, 'addCategory'])->name('addnewcategory');
    Route::post('/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');

    Route::get('/users', [UserController::class, 'ShowUsers'])->name('users');
    Route::post('/updateUser/{id}', [UserController::class, 'updateUserRole'])->name('updateUser');
    Route::post('/banuser/{id}', [UserController::class, 'BanUser'])->name('banuser');

    Route::get('/events', [EventController::class, 'ShowEventsAdmin'])->name('events');
    Route::post('/acceptEvent/{id}', [EventController::class, 'ApproveEvent'])->name('approveEvent');
    Route::post('/refuseEvent/{id}', [EventController::class, 'RefuseEvent'])->name('refuseEvent');

    Route::get('/stats', [AdminController::class, 'ShowStats'])->name('stats');
});







require __DIR__ . '/auth.php';
