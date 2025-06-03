<?php

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function() {
    //../
})->middleware(EnsureTokenIsValid::class);

Route::put('/post/{id}', function() {
    //.
})->middleware(EnsureUserHasRole::class.'editor');