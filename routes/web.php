<?php

use App\Http\Controllers\CategoriasController;
use App\Models\Categorias;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template');
});
Route::view('/panel', 'panel.index')->name('panel');


Route::resource('categorias', CategoriasController::class);
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/401', function () {
    return view('pages.401');
});

Route::get('/404', function () {
    return view('pages.404');
});
Route::get('/500', function () {
    return view('pages.500');
});
