<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDonXuat;
class HoaDonXuatController extends Controller
{
    //
    public function index()
    {
        $hoadonxuat = HoaDonXuat::orderBy('id', 'desc')->get();
        $viewData = [
            'hoadonxuat' => $hoadonxuat,
        ];
        return view('admin.BanThuoc.index', $viewData);
    }
}
