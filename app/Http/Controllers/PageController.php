<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuoc;
use App\Models\NhomThuoc;
use App\Models\HoaDonXuat;
use App\Models\ChiTietHoaDonXuat;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function index() {
        $thuoc = Thuoc::orderBy('id', 'desc')->get();
        $viewData = [
            'thuoc' => $thuoc,
        ];
        return view('pages.index', $viewData);
    }

    public function getGioiThieu() {
        return view('pages.gioi-thieu');
    }

    public function getLienHe() {
        return view('pages.lien-he');
    }

    public function getLogin() {
        return view('pages.layouts.signin');
    }

    public function getThuoc() {
        $nhomthuoc = NhomThuoc::all();
        $viewData = [
            'nhomthuoc' => $nhomthuoc,
        ];
        return view('pages.thuoc', $viewData);
    }

    public function getNhomThuoc($slug, $id) {
        $nhomthuoc = NhomThuoc::find($id);
        $viewData = [
            'nhomthuoc' => $nhomthuoc,
        ];
        return view('pages.nhom-thuoc', $viewData);

    }

    public function getThuocDetail($nhom_slug, $nhom_id, $thuoc_slug, $thuoc_id) {
        $thuoc = Thuoc::find($thuoc_id);
        $viewData = [
            'thuoc' => $thuoc,
        ];
        return view('pages.chi-tiet-thuoc', $viewData);
    }
    
    public function getPayment() {
        return view('pages.thanh-toan');
    }
    
    public function getThanhCong() {
        return view('pages.thong-bao');
    }
    
    public function postPayment(Request $request) {

        $this->validate($request,[
            "ho_ten" => "required",
            "dien_thoai" => "required",
            "dia_chi" => "required",
        ],[
            'ho_ten.required' => 'Hãy nhập họ tên!',
            'dien_thoai.required' => 'Hãy nhập só điện thoại!',
            'dia_chi.required' => 'Hãy nhập địa chỉ!',
        ]);

        $kh = KhachHang::find(Auth::user()->khach_hang->id);
        $kh->ho_ten = $request->ho_ten; 
        $kh->dia_chi = $request->dia_chi;
        $kh->dien_thoai = $request->dien_thoai;
        $kh->save();

        $cart = \Session::get('Cart');

        $hdx = new HoaDonXuat;
        $hdx->khach_hang_id = $kh->id;
        $hdx->tong_tien = $cart->tongGia;
        $hdx->save();

        foreach ($cart->thuoc as $key => $value) {
            $cthdx = new ChiTietHoaDonXuat;
            $cthdx->hoa_don_xuat_id = $hdx->id;
            $cthdx->thuoc_id = $key;
            $cthdx->so_luong = $value['so_luong'];
            $cthdx->don_gia = $value['don_gia_ban'];
            $cthdx->thanh_tien = $value['so_luong'] * $value['don_gia_ban'];
            $cthdx->save();

            $thuoc = Thuoc::find($key);
            $thuoc->so_luong -= $value['so_luong'];
            $thuoc->da_ban += $value['so_luong'];
            $thuoc->save();
        }

        $request->session()->forget('Cart');

        return redirect()->route('index.getThanhCong');
    }

    public function getSearch(Request $request) {
        $thuoc = Thuoc::where('ten_thuoc', 'like', '%'.$request->input_search.'%')->get();
        if(!$thuoc) {
            $nhom_thuoc = NhomThuoc::where('ten_nhom_thuoc', 'like', '%'.$request->input_search.'%')->get();
            $thuoc = Thuoc::where('nhom_thuoc_id', '=', $nhom_thuoc[0]->id)->get();
        };
        $viewData = [
            'thuoc' => $thuoc,
        ];
        return view('pages.thuoc', $viewData);
    }

    
}
