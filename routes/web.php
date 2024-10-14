<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route resource untuk kontak
Route::resource('contacts', ContactController::class);

// Ubah route untuk root
Route::redirect('/', '/contacts');