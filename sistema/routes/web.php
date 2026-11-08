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

Route::get('/grupos', function () {
    return view('grupos');
});

Route::get('/pagos', function () { 
    return view('pagos'); 
});

Route::get('/materias', function () {
    return view('materias');
});




