<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    App::setLocale('fr');

    return view('welcome');
});
