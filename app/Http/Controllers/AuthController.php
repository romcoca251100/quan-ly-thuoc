<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\NhanVien;
use App\Models\User;
use App\Models\KhachHang;

class AuthController extends Controller
{
    //Admin
    public function index() {
        return view('admin.index');
    }

    public function adminLogin() {
        return view('admin.layouts.login');
    }

    public function postAdminLogin(Request $request) {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩU',
        ]);

        $remember = $request->has('remember') ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('admin.index');
            
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }
        
    }

    public function adminLogout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function userLogout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function postUserLogin(Request $request) {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩU',
        ]);

        $remember = $request->has('remember') ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('thongbao', 'Tài khoản hoặc mật khẩu sai!');
        }
    }

    public function postUserRegister(Request $request) {
        $this->validate($request,[
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'ho_ten' => 'required',
            'dien_thoai' => 'required',
            'ngay_sinh' => 'required',
            'dia_chi' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'ngay_sinh.required' => 'Bạn chưa nhập ngày sinh',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
        ]);

        $user = new User;
        $user->role = 3;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $kh = new KhachHang;
        $kh->user_id = $user->id;
        $kh->ho_ten = $request->ho_ten;
        $kh->dien_thoai = $request->dien_thoai;
        $kh->ngay_sinh = $request->ngay_sinh;
        $kh->dia_chi = $request->dia_chi;
        $kh->save();

        return redirect()->back()->with('thongbao2', 'Bạn đã đăng ký thành công! Hãy đăng nhập.');
    }

    public function getProfile() {
        return view('pages.profile');
    }
}
