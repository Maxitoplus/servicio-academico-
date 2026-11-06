<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/alumnos', function () {
    return view('alumnos');
});

Route::get('/docentes', function () {
    return view('docentes');
});


