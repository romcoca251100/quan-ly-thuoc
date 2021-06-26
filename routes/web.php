<?php

namespace App\Http\Controllers;

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

Route::get('dang-nhap', [AuthController::class, 'userLogin'])->name('index.login');
Route::get('admin/dang-nhap', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/dang-nhap', [AuthController::class, 'postAdminLogin'])->name('admin.postLogin');

Route::prefix('admin')->middleware('admin.login')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/dang-xuat', [AuthController::class, 'adminLogout'])->name('admin.logout');

    Route::prefix('nhom-thuoc')->group(function () {
        Route::get('/', [NhomThuocController::class, 'index'])->name('admin.nhomthuoc.index');

        Route::post('/them', [NhomThuocController::class, 'postAdd'])->name('admin.nhomthuoc.postAdd');

        Route::get('/sua/{id}', [NhomThuocController::class, 'getEdit'])->name('admin.nhomthuoc.getEdit');
        Route::post('/sua/{id}', [NhomThuocController::class, 'postEdit'])->name('admin.nhomthuoc.postEdit');

        Route::get('/xoa/{id}', [NhomThuocController::class, 'getDelete'])->name('admin.nhomthuoc.getDelete');
    });

    Route::prefix('thuoc')->group(function () {
        Route::get('/', [ThuocController::class, 'index'])->name('admin.thuoc.index');

        Route::get('/them', [ThuocController::class, 'getAdd'])->name('admin.thuoc.getAdd');
        Route::post('/them', [ThuocController::class, 'postAdd'])->name('admin.thuoc.postAdd');

        Route::get('/sua/{id}', [ThuocController::class, 'getEdit'])->name('admin.thuoc.getEdit');
        Route::post('/sua/{id}', [ThuocController::class, 'postEdit'])->name('admin.thuoc.postEdit');

        Route::get('/xoa/{id}', [ThuocController::class, 'getDelete'])->name('admin.thuoc.getDelete');
    });

    Route::prefix('ds-hoa-don-nhap-thuoc')->group(function () {
        Route::get('/', [HoaDonNhapController::class, 'index'])->name('admin.hoadonnhap.index');

        Route::get('/them', [HoaDonNhapController::class, 'getAdd'])->name('admin.hoadonnhap.getAdd');
        Route::post('/them', [HoaDonNhapController::class, 'postAdd'])->name('admin.hoadonnhap.postAdd');
    });

    Route::prefix('ds-hoa-don-ban-thuoc')->group(function () {
        Route::get('/', [HoaDonXuatController::class, 'index'])->name('admin.hoadonxuat.index');

    });

});
