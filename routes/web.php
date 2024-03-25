<?php

use App\Models\Flight;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\TransactionController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('roles:user')->group(function () {
    Route::get('/User.Dashboard', [UserController::class, 'index'])->name('User.dashboard');

    Route::get('/User.Buy/{id}', [TransactionController::class, 'create'])->name('User.detail_pemesan');
    Route::post('/User.Buy.store/{id}', [TransactionController::class, 'store'])->name('User.buy.store');

    Route::get('/User.List.Tiket', [TransactionController::class, 'show'])->name('User.List.Tiket');

});

Route::middleware('roles:admin')->group(function () {

    Route::get('/Admin.Dashboard', [AdminController::class, 'index'])->name('Admin.dashboard');

    Route::get('/Admin.laporan', [AdminController::class, 'show'])->name('Admin.laporan');
    Route::post('/Admin.laporan.confirm/{id}', [AdminController::class, 'confirmPayment'])->name('Admin.laporan.confirm');

    Route::get('/Admin.Edit_Role/{id}', [AdminController::class, 'edit'])->name('Admin.edit_role');
    Route::post('/Admin.Edit_Role/{id}', [AdminController::class, 'update'])->name('Admin.edit_role.update');
    Route::delete('/Admin.delete.user/{id}', [AdminController::class, 'delete'])->name('Admin.delete.user');

    Route::get('/Admin.list_airline', [AirlineController::class, 'index'])->name('Admin.list_airline');
    Route::get('/Admin.add_airline', [AirlineController::class, 'create'])->name('Admin.add_airline');
    Route::post('/Admin.add_airline', [AirlineController::class, 'store'])->name('Admin.add_airline.store');

    Route::get('/Admin.edit_airline/{id}', [AirlineController::class, 'edit'])->name('Admin.edit_airline');
    Route::post('/Admin.edit_airline/{id}', [AirlineController::class, 'update'])->name('Admin.edit_airline.update');
    Route::delete('/Admin.airline.delete/{id}', [AirlineController::class, 'delete'])->name('Admin.airline.delete');

    Route::get('/search', [TransactionController::class, 'search'])->name('search');
});

Route::middleware('roles:maskapai')->group(function () {
    Route::get('/Maskapai.Dashboard', [MaskapaiController::class, 'index'])->name('Maskapai.dashboard');

    Route::get('/Maskapai.add.flight', [MaskapaiController::class, 'create'])->name('Maskapai.add.flight');
    Route::post('/Maskapai.add.flight.store', [FlightController::class, 'store'])->name('Maskapai.add.flight.store');

    Route::get('/Maskapai.edit.flight/{id}', [MaskapaiController::class, 'edit'])->name('Maskapai.edit.flight');
    Route::post('/Maskapai.edit.flight.update/{id}', [FlightController::class, 'update'])->name('Maskapai.edit.flight.update');

    Route::delete('/Maskapai.flight.delete/{id}', [FlightController::class, 'delete'])->name('Maskapai.flight.delete');

});

require __DIR__.'/auth.php';
