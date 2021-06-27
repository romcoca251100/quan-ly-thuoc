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

//Page
    //Public Routes
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/gioi-thieu', [PageController::class, 'getGioiThieu'])->name('index.getGioiThieu');
Route::get('/lien-he', [PageController::class, 'getLienHe'])->name('index.getLienHe');

Route::get('/{slug}&id={id}', [PageController::class, 'getNhomThuoc'])->name('index.getNhomThuoc');

Route::get('/thuoc', [PageController::class, 'getThuoc'])->name('index.getThuoc');

Route::get('/{nhom_slug}&id={nhom_id}/{thuoc_slug}&id={thuoc_id}', [PageController::class, 'getThuocDetail'])->name('index.getThuocDetail');

Route::get('/dang-nhap', [PageController::class, 'getLogin'])->middleware('check.login')->name('index.login');
Route::post('/dang-nhap', [AuthController::class, 'postUserLogin'])->middleware('check.login')->name('index.postUserLogin');
Route::post('/dang-ky', [AuthController::class, 'postUserRegister'])->middleware('check.login')->name('index.postUserRegister');

    //Protected Routes
Route::prefix('nguoi-dung')->group(function () {
    Route::get('/dang-xuat', [AuthController::class, 'userLogout'])->name('index.userLogout');
});

//Admin
    //Public Routes

Route::get('admin/dang-nhap', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/dang-nhap', [AuthController::class, 'postAdminLogin'])->name('admin.postLogin');

    //Protected Routes

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

        Route::get('/xem/{id}', [HoaDonNhapController::class, 'getView'])->name('admin.hoadonnhap.getView');
    });

    Route::prefix('ds-hoa-don-ban-thuoc')->group(function () {
        Route::get('/', [HoaDonXuatController::class, 'index'])->name('admin.hoadonxuat.index');

    });

    Route::prefix('quan-ly-khach-hang')->group(function () {
        Route::get('/', [KhachHangController::class, 'index'])->name('admin.khachhang.index');

    });

    Route::prefix('quan-ly-nhan-vien')->middleware('admin.role')->group(function () {
        Route::get('/', [NhanVienController::class, 'index'])->name('admin.nhanvien.index');

        Route::get('/them', [NhanVienController::class, 'getAdd'])->name('admin.nhanvien.getAdd');
        Route::post('/them', [NhanVienController::class, 'postAdd'])->name('admin.nhanvien.postAdd');

        Route::get('/sua/{id}', [NhanVienController::class, 'getEdit'])->name('admin.nhanvien.getEdit');
        Route::post('/sua/{id}', [NhanVienController::class, 'postEdit'])->name('admin.nhanvien.postEdit');

        Route::get('/xoa/{id}', [NhanVienController::class, 'getDelete'])->name('admin.nhanvien.getDelete');

        Route::get('/lay-lai-mat-khau/{id}', [NhanVienController::class, 'getChangePassword'])->name('admin.nhanvien.getChangePassword');
    });

});
