<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhomThuoc;

class NhomThuocController extends Controller
{
    //
    public function index() {
        $nhomthuoc = NhomThuoc::orderBy('id', 'desc')->get();
        $viewData = [
            'nhomthuoc' => $nhomthuoc,
        ];
        return view('admin.NhomThuoc.index', $viewData);
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
        $nhomthuoc->slug = \Str::slug($request->ten_nhom_thuoc);
        $nhomthuoc->save();
        return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
    }

    public function getEdit($id) {
        $nhomthuoc = NhomThuoc::find($id);
        return response()->json(['data'=>$nhomthuoc],200);
    }

    public function postEdit(Request $request, $id) {
        $nhomthuoc = NhomThuoc::find($id);
        $this->validate($request,[
            'ten_nhom_thuoc' => 'required|unique:nhom_thuocs,ten_nhom_thuoc,'.$id,
        ], [
            'ten_nhom_thuoc.required' => 'Bạn chưa nhập email',
            'ten_nhom_thuoc.unique' => 'Trùng tên nhóm thuốc',
        ]);
        $nhomthuoc->ten_nhom_thuoc = $request->ten_nhom_thuoc;
        $nhomthuoc->slug = \Str::slug($request->ten_nhom_thuoc);
        $nhomthuoc->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id) {
        NhomThuoc::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
