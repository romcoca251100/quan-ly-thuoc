<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\NhanVien;

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
        return redirect()->route('pages.layouts.signin');
    }
}
