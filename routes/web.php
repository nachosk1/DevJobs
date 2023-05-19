<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
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
})->name('home');

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'rol.recruiter'])->name('vacants.index');
Route::get('/vacants/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');
Route::get('/vacants/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacants.edit');
Route::get('/vacants/{vacant}', [VacantController::class, 'show'])->name('vacants.show');

// Notification
Route::get('/notification', NotificationController::class)->middleware(['auth', 'verified', 'rol.recruiter'])->name('notifications');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
