<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NhanVien;

class NhanVienController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', '=', 2)->get();
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyNhanVien.index', $viewData);
    }

    public function getAdd()
    {
        return view('admin.QuanLyNhanVien.add');
    }

    public function postAdd(Request $request) {
        $this->validate($request, [
            'ho_ten' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:32',
            'dien_thoai' => 'required',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
        ],
        [
            "ho_ten.required" => "Hãy nhập tên!",
            "email.required" => "Hãy nhập email!",
            "email.unique" => "Email đã tồn tại!",
            "password.required" => "Hãy nhập password!",
            "password.min" => "Độ dài mật khẩu lớn hơn 6!",
            "password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            "dien_thoai.required" => "Hãy nhập số điện thoại!",
            "ngay_sinh.required" => "Hãy nhập ngày sinh!",
            "gioi_tinh.required" => "Hãy chọn giới tính!",
            "dia_chi.required" => "Hãy nhập địa chỉ!",
        ]);

        $user = new User;
        $user->role = 2;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $nhanvien = new NhanVien;
        $nhanvien->user_id = $user->id;
        $nhanvien->ho_ten = $request->ho_ten;
        $nhanvien->dien_thoai = $request->dien_thoai;
        $nhanvien->ngay_sinh = $request->ngay_sinh;
        $nhanvien->gioi_tinh = $request->gioi_tinh;
        $nhanvien->dia_chi = $request->dia_chi;
        $nhanvien->save();
        return redirect()->back()->with('thongbao', 'Thêm thành công!');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyNhanVien.edit', $viewData);
    }

    public function postEdit(Request $request, $id) {
        $user = User::find($id);
        $this->validate($request, [
            'ho_ten' => 'required',
            'dien_thoai' => 'required',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
        ],
        [
            "ho_ten.required" => "Hãy nhập tên!",
            "dien_thoai.required" => "Hãy nhập số điện thoại!",
            "ngay_sinh.required" => "Hãy nhập ngày sinh!",
            "gioi_tinh.required" => "Hãy chọn giới tính!",
            "dia_chi.required" => "Hãy nhập địa chỉ!",
        ]);

        $nhanvien = NhanVien::where('user_id', '=', $id)->get();
        foreach ($nhanvien as $item) {
            $item->ho_ten = $request->ho_ten;
            $item->dien_thoai = $request->dien_thoai;
            $item->ngay_sinh = $request->ngay_sinh;
            $item->gioi_tinh = $request->gioi_tinh;
            $item->dia_chi = $request->dia_chi;
            $item->save();
        }
        
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id)
    {
        $nhanvien = NhanVien::where('user_id', '=', $id)->get();
        foreach ($nhanvien as $item) {
            $item->delete();
        }
        User::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }

    public function getChangePassword($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('12345678');
        return redirect()->back()->with('thongbao', 'Mật khẩu được trả về "12345678" !');
    }
}
