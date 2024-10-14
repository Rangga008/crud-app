<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Define the resource routes for the ContactController
Route::resource('contacts', ContactController::class);