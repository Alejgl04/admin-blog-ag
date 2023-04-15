<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('', [ HomeController::class, 'index' ]);
