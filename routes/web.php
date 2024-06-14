<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index']);
Route::get('/api/news', [NewsController::class, 'getNews']);
