<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\HoaDonNhap;
use App\Models\ChiTietHoaDonNhap;
use App\Models\NhomThuoc;
use App\Models\Thuoc;
use Illuminate\Support\Facades\Auth;

class HoaDonNhapController extends Controller
{
    //
    public function index()
    {
        $hoadonnhap = HoaDonNhap::orderBy('id', 'desc')->get();
        $viewData = [
            'hoadonnhap' => $hoadonnhap,
        ];
        return view('admin.NhapThuoc.index', $viewData);
    }

    public function getAdd()
    {
        $nhomthuoc = NhomThuoc::all();
        $viewData = [
            'nhomthuoc' => $nhomthuoc,
        ];
        return view('admin.NhapThuoc.add', $viewData);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'ten_thuoc.*' => 'required|unique:thuocs,ten_thuoc',
            'nhom_thuoc_id.*' => 'required',
            'don_gia_nhap.*' => 'required|numeric|min:0',
            'don_gia_ban.*' => 'required|numeric|min:0',
            'hinh_anh.*' => 'image',
            'so_luong.*' => 'required|numeric|min:1',
        ], [
            'ten_thuoc.*.required' => 'Bạn chưa nhập tên thuốc',
            'ten_thuoc.*.unique' => 'Trùng tên thuốc',
            'nhom_thuoc_id.*.required' => 'Bạn chưa chọn nhóm thuốc',
            'don_gia_nhap.*.required' => 'Bạn chưa điền giá nhập',
            'so_luong.*.required' => 'Hãy nhập số lượng',
            'don_gia_ban.*.required' => 'Bạn chưa điền giá bán',
            'hinh_anh.*.image' => 'Hỉnh ảnh tải lên không đúng định dạng',
            'so_luong.*.numeric' => 'Hãy nhập số!',
            'don_gia_ban.*.numeric' => 'Hãy nhập số!',
            'don_gia_nhap.*.numeric' => 'Hãy nhập số!',
            'so_luong.*.min' => 'Số lượng lớn hơn 1!',
            'don_gia_ban.*.min' => 'Đơn giá nhập lớn hơn 0!',
            'don_gia_nhap.*.min' => 'Đơn giá bán lớn hơn 0!',
        ]);
        $results = [];
        $hdn = new HoaDonNhap;
        $hdn->nhan_vien_id = Auth::user()->id;
        $hdn->ngay_lap = \Carbon\Carbon::now();
        $hdn->save();

        for ($i=0; $i < count($request->ten_thuoc); $i++) {
            $thuoc = new Thuoc;
            $thuoc->nhom_thuoc_id = $request->nhom_thuoc_id[$i];
            $thuoc->ten_thuoc = $request->ten_thuoc[$i];
            $thuoc->slug = \Str::slug($request->ten_thuoc[$i]);
            $thuoc->don_gia_nhap = $request->don_gia_nhap[$i];
            $thuoc->don_gia_ban = $request->don_gia_ban[$i];
            $thuoc->ghi_chu = $request->ghi_chu[$i];
            $thuoc->so_luong = $request->so_luong[$i];
            $thuoc->save();

            $cthdn = new ChiTietHoaDonNhap;
            $cthdn->hoa_don_nhap_id = $hdn->id;
            $cthdn->thuoc_id = $thuoc->id;
            $cthdn->so_luong = $thuoc->so_luong;
            $cthdn->don_gia = $thuoc->don_gia_nhap;
            $cthdn->thanh_tien = $thuoc->don_gia_nhap * $thuoc->so_luong;
            $cthdn->save();
        }
        return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
    }
}
