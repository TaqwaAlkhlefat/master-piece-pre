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
Route::get('/vote', [HomeController::class, 'vote'])->name('vote');
Route::get('/ourdoctor', [HomeController::class, 'ourdoctor'])->name('ourdoctor');
// Route::get('/filter-clients', [HomeController::class, 'filterClients'])->name('filterClients');




Route::get('/accept_doctor_view', [AdminController::class, 'acceptview']);
// Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::match(['GET', 'POST'], '/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route::post('/upload_doctor/{id}', [AdminController::class, 'upload'])->name('admin.upload');

Route::get('/acceptDoctor/{id}', [AdminController::class, 'acceptDoctor'])->name('acceptDoctor');

Route::get('/deletDoctor/{id}', [AdminController::class, 'deletDoctor'])->name('deletDoctor');

Route::get('/deletClient/{id}', [AdminController::class, 'deletClient'])->name('deletClient');

Route::get('/acceptview', [AdminController::class, 'acceptview'])->name('acceptview');






Route::match(['get', 'post'], '/appointmentt', [HomeController::class, 'appointmentt']);

// Route::match(['get', 'post'], '/myappointment', [HomeController::class, 'myappointment']);


Route::get('/myappointment', [HomeController::class, 'myappointment'])->name('myappointment');

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint'])->name('cancel_appoint');

Route::get('/showappointment', [DoctorController::class, 'showappointment'])->name('showappointment');

Route::get('/changeinformation', [DoctorController::class, 'changeinformation'])->name('changeinformation');

Route::post('/editdoctor/{id}', [DoctorController::class, 'editdoctor'])->name('editdoctor');


// Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');




// in doctor dashboard

Route::get('/approved/{id}', [DoctorController::class, 'approved'])->name('approved');

Route::get('/canceled/{id}', [DoctorController::class, 'canceled'])->name('canceled');

Route::post('/updateinformation', [DoctorController::class, 'updateInformation'])->name('updateinformation');

Route::get('/emailview/{id}', [DoctorController::class, 'emailview'])->name('emailview');

Route::post('/sendemail/{id}', [DoctorController::class, 'sendemail'])->name('sendemail');

//

Route::put('/update-phone/{id}',  [DoctorController::class, 'updatePhone'])->name('update.phone');
Route::put('/update-session-price/{id}', [DoctorController::class, 'updateSessionPrice'])->name('update.session_price');
Route::put('/update-address/{id}',  [DoctorController::class, 'updateAddress'])->name('update.address');
Route::put('/update-experience/{id}',  [DoctorController::class, 'updateExperience'])->name('update.experience');


//


// For Voting System

// admin routes
// Route::middleware(['auth:admin'])->group(function () {
//     Route::prefix('/admin')->group(function () {
//         Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
//         Route::get('/positions', Position::class)->name('admin.positions');
//         Route::get('/condidates', Condidate::class)->name('admin.condidates');
//         Route::get('/voters', Voter::class)->name('admin.voters');
//         Route::get('/settings', Setting::class)->name('admin.settings');
//         Route::get('/change-password', ChangePassword::class)->name('admin.change_password');
//         Route::get('/votes', GetCandidateVotes::class)->name('admin.votes');
//     });
// });

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/positions', [PositionController::class, 'index'])->name('positions');
    Route::get('/candidates', [AdminController::class, 'index'])->name('candidates');
    Route::get('/voters', [VoterController::class, 'index'])->name('voters');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change_password');
    Route::get('/votes', [VoteController::class, 'index'])->name('votes');
});

//

// Route::get('/accept_doctor_view', [AdminController::class, 'acceptview']);

Route::get('/condidate_view', [AdminController::class, 'condidateview']);

Route::post('/upload_condidate', [AdminController::class, 'upload_condidate'])->name('upload_condidate');

Route::get('/deletcandidate/{id}', [AdminController::class, 'deletcandidate'])->name('deletcandidate');

Route::get('/showClients', [AdminController::class, 'showClients'])->name('showClients');

Route::get('/searchDoctors',  [AdminController::class,'acceptview'])->name('searchDoctors');




// add vote  user


Route::match(['get', 'post'],'/addVote/{id}', [HomeController::class, 'addVote'])->name('addVote');

// for confirm delete

// Route::get('/delete-client/{id}', [AdminController::class, 'deletClient'])->name('delete.client');
// Route::get('/back', function () {
//     return redirect()->back();
// })->name('back');

