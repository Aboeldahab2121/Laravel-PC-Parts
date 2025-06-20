<?php

use App\Http\Controllers\ItemViewController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [ItemViewController::class , 'index']);
