<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Thuoc;
use App\Models\NhomThuoc;

class ThuocController extends Controller
{
    //
    public function index() {
        $thuoc = Thuoc::orderBy('id', 'desc')->get();
        $viewData = [
            'thuoc' => $thuoc,
        ];
        return view('admin.Thuoc.index', $viewData);
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'ten_nhom_thuoc' => 'required|unique:nhom_thuocs,ten_nhom_thuoc',
        ], [
            'ten_nhom_thuoc.required' => 'Bạn chưa nhập email',
            'ten_nhom_thuoc.unique' => 'Trùng tên nhóm thuốc',
        ]);
        $nhomthuoc = new NhomThuoc;
        $nhomthuoc->ten_nhom_thuoc = $request->ten_nhom_thuoc;
        $nhomthuoc->slug = Str::slug($request->ten_nhom_thuoc);
        $nhomthuoc->save();
        return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
    }

    public function getEdit($id) {
        $thuoc = Thuoc::find($id);
        $nhomthuoc = NhomThuoc::all();
        $viewData = [
            'thuoc' => $thuoc,
            'nhomthuoc' => $nhomthuoc,
        ];
        return view('admin.Thuoc.edit', $viewData);
    }

    public function postEdit(Request $request, $id) {
        $thuoc = Thuoc::find($id);
        $this->validate($request, [
            'ten_thuoc' => 'required|unique:thuocs,ten_thuoc,'.$id,
            'nhom_thuoc_id' => 'required',
            'don_gia_nhap' => 'required|numeric|min:0',
            'don_gia_ban' => 'required|numeric|min:0',
            'hinh_anh' => 'image',
            'so_luong' => 'required|numeric|min:1',
        ], [
            'ten_thuoc.required' => 'Bạn chưa nhập tên thuốc',
            'ten_thuoc.unique' => 'Trùng tên thuốc',
            'nhom_thuoc_id.required' => 'Bạn chưa chọn nhóm thuốc',
            'don_gia_nhap.required' => 'Bạn chưa điền giá nhập',
            'so_luong.required' => 'Hãy nhập số lượng',
            'don_gia_ban.required' => 'Bạn chưa điền giá bán',
            'hinh_anh.image' => 'Hỉnh ảnh tải lên không đúng định dạng',
            'so_luong.numeric' => 'Hãy nhập số!',
            'don_gia_ban.numeric' => 'Hãy nhập số!',
            'don_gia_nhap.numeric' => 'Hãy nhập số!',
            'so_luong.min' => 'Số lượng lớn hơn 1!',
            'don_gia_ban.min' => 'Đơn giá nhập lớn hơn 0!',
            'don_gia_nhap.min' => 'Đơn giá bán lớn hơn 0!',
        ]);

        $thuoc->nhom_thuoc_id = $request->nhom_thuoc_id;
        $thuoc->ten_thuoc = $request->ten_thuoc;
        $thuoc->slug = \Str::slug($request->ten_thuoc);
        $thuoc->don_gia_nhap = $request->don_gia_nhap;
        $thuoc->don_gia_ban = $request->don_gia_ban;
        $thuoc->ghi_chu = $request->ghi_chu;
        $thuoc->so_luong = $request->so_luong;

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');

            $name = $file->getClientOriginalName();
            $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;

            while (file_exists("upload/sanpham/" . $hinh)) {
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            }
            
            $file->move("upload/images/thuoc", $hinh);
            $thuoc->hinh_anh = "upload/images/thuoc/".$hinh;
        }

        $thuoc->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id) {
        Thuoc::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
