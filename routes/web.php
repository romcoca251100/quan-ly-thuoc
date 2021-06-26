<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/gioi-thieu', function () {
    return view('pages.gioi-thieu');
})->name('index.getGioiThieu');

Route::get('/lien-he', function () {
    return view('pages.lien-he');
})->name('index.getLienHe');

Route::get('/dang-nhap', function () {
    return view('pages.layouts.signin');
})->name('login');
