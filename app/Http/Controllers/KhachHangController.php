<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KhachHang;

class KhachHangController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', '=', 3)->get();
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyKhachHang.index', $viewData);
    }
}
