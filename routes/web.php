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

Route::get('/tim-kiem', [PageController::class, 'getSearch'])->name('index.getSearch');

Route::get('/dang-nhap', [PageController::class, 'getLogin'])->name('index.login');
Route::post('/dang-nhap', [AuthController::class, 'postUserLogin'])->name('index.postUserLogin');
Route::post('/dang-ky', [AuthController::class, 'postUserRegister'])->name('index.postUserRegister');

    //Protected Routes
Route::prefix('nguoi-dung')->middleware('user.login')->group(function () {
    Route::get('/thong-tin', [AuthController::class, 'getProfile'])->name('index.getProfile');
    Route::post('/thong-tin', [AuthController::class, 'editProfile'])->name('index.editProfile');

    Route::get('/huy-don-hang/{id}', [HoaDonXuatController::class, 'cancelOrder'])->name('admin.hoadonxuat.cancelOrder');

    Route::post('/doi-mat-khau', [AuthController::class, 'postUserPassword'])->name('index.postUserPassword');

    Route::get('/dang-xuat', [AuthController::class, 'userLogout'])->name('index.userLogout');
});

Route::prefix('gio-hang')->group(function () {
    Route::get('/', [CartController::class, 'getCart'])->name('index.getCart');
    Route::get('/cart', [CartController::class, 'getCartTemp'])->name('cart');

    Route::get('/them/{id}', [CartController::class, 'addCart'])->name('index.addCart');

    Route::get('/sua/{id}/{tong}', [CartController::class, 'updateCart'])->name('index.updateCart');

    Route::get('/xoa/{id}', [CartController::class, 'getDelete'])->name('index.getDelete');
});

Route::get('/thong-bao', [PageController::class, 'getThanhCong'])->name('index.getThanhCong');

Route::prefix('thanh-toan')->middleware('payment')->group(function () {
    Route::get('/', [PageController::class, 'getPayment'])->name('index.getPayment');

    Route::post('/', [PageController::class, 'postPayment'])->name('index.postPayment');

});

//Admin
    //Public Routes

Route::get('admin/dang-nhap', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/dang-nhap', [AuthController::class, 'postAdminLogin'])->name('admin.postLogin');

    //Protected Routes

Route::prefix('admin')->middleware('admin.login')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('admin.index');
    Route::get('/dang-xuat', [AuthController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/thong-tin-nhan-vien', [AuthController::class, 'adminProfile'])->name('admin.profile');

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
        Route::get('/in/{id}', [HoaDonNhapController::class, 'print'])->name('admin.hoadonnhap.print');
    });

    Route::prefix('ds-hoa-don-ban-thuoc')->group(function () {
        Route::get('/', [HoaDonXuatController::class, 'index'])->name('admin.hoadonxuat.index');

        Route::get('/xac-nhan-don-hang/{id}', [HoaDonXuatController::class, 'acceptOrder'])->name('admin.hoadonxuat.acceptOrder');

        Route::get('/bat-dau-giao-hang/{id}', [HoaDonXuatController::class, 'startShip'])->name('admin.hoadonxuat.startShip');
        Route::get('/huy-giao-hang/{id}', [HoaDonXuatController::class, 'cancelShip'])->name('admin.hoadonxuat.cancelShip');

        Route::get('/huy-don-hang/{id}', [HoaDonXuatController::class, 'cancelOrder'])->name('admin.hoadonxuat.AdmincancelOrder');

        Route::get('/xac-nhan-thanh-toan/{id}', [HoaDonXuatController::class, 'acceptPayment'])->name('admin.hoadonxuat.acceptPayment');

        Route::get('/xem/{id}', [HoaDonXuatController::class, 'getView'])->name('admin.hoadonxuat.getView');
        Route::get('/in/{id}', [HoaDonXuatController::class, 'print'])->name('admin.hoadonxuat.print');
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

    Route::prefix('thong-ke')->group(function () {
        Route::get('/', [ThongKeController::class, 'index'])->name('admin.thongke.index');

        
        Route::get('bieu-do', [ThongKeController::class, 'loadChart'])->name('admin.thongke.loadChart');

        Route::get('bieu-do-2', [ThongKeController::class, 'loadChart2'])->name('admin.thongke.loadChart2');

        Route::get('bieu-do-3', [ThongKeController::class, 'loadChart3'])->name('admin.thongke.loadChart3');


    });

});
