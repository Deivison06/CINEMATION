<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

route::get('/', [MovieController::class, 'index'])->name('home');