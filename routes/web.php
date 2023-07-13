<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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


Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

// Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/appointment', [HomeController::class, 'show'])->name('appointment');
Route::get('/dentline', [HomeController::class, 'store'])->name('dentline');
Route::get('/contact', [HomeController::class, 'cont'])->name('contact');


Route::get('/accept_doctor_view', [AdminController::class, 'acceptview']);
// Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::match(['GET', 'POST'], '/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route::post('/upload_doctor/{id}', [AdminController::class, 'upload'])->name('admin.upload');

Route::get('/acceptDoctor/{id}', [AdminController::class, 'acceptDoctor'])->name('acceptDoctor');

Route::get('/deletDoctor/{id}', [AdminController::class, 'deletDoctor'])->name('deletDoctor');



Route::match(['get', 'post'], '/appointmentt', [HomeController::class, 'appointmentt']);

// Route::match(['get', 'post'], '/myappointment', [HomeController::class, 'myappointment']);


Route::get('/myappointment', [HomeController::class, 'myappointment'])->name('myappointment');

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint'])->name('cancel_appoint');

Route::get('/showappointment', [DoctorController::class, 'showappointment'])->name('showappointment');

Route::get('/changeinformation', [DoctorController::class, 'changeinformation'])->name('changeinformation');

// Route::Post('/editdoctor', [DoctorController::class, 'editdoctor'])->name('editdoctor');






// in doctor dashboard

Route::get('/approved/{id}', [DoctorController::class, 'approved'])->name('approved');

Route::get('/canceled/{id}', [DoctorController::class, 'canceled'])->name('canceled');

Route::post('/updateinformation', [DoctorController::class, 'updateInformation'])->name('updateinformation');

Route::get('/emailview/{id}', [DoctorController::class, 'emailview'])->name('emailview');

Route::post('/sendemail/{id}', [DoctorController::class, 'sendemail'])->name('sendemail');
