<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\PawiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/register', Register::class);
    Route::post('/login', Login::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [PawiController::class, 'index']);
    Route::post('/pawis', [PawiController::class, 'store']);
    Route::get('/pawis/{pawi}/edit', [PawiController::class, 'edit']);
    Route::put('/pawis/{pawi}', [PawiController::class, 'update']);
    Route::delete('/pawis/{pawi}', [PawiController::class, 'destroy']);

    Route::post('/logout', Logout::class);
});




// // View
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// // Verify email
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');
// // Resend verification
// Route::post('/email/verification-notification', function (Request $request) {
//     Auth::user()->sendEmailVerificationNotification();
//     return back()->with('status', 'verification-link-sent');
// })->middleware(['auth', 'throttle:1,1'])->name('verification.send');



