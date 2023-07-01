<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;



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



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/appointment', [HomeController::class, 'show'])->name('appointment');
Route::get('/dentline', [HomeController::class, 'store'])->name('dentline');
Route::get('/contact', [HomeController::class, 'cont'])->name('contact');


Route::get('/accept_doctor_view', [AdminController::class, 'acceptview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::match(['GET', 'POST'], '/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
