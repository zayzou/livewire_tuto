<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('welcome');
});
