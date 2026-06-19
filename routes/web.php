<?php

use App\Http\Controllers\PawiController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [PawiController::class, 'index']);
