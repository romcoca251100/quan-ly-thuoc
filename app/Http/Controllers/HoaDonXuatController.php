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

    public function acceptOrder($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 1;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Xác nhận đơn hàng DH'.$hoadonxuat->id.' thành công!');
    }

    public function startShip($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 2;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã bắt đầu được giao!');
    }

    public function acceptPayment($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 3;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được thanh toán!');
    }

    public function cancelOrder($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        if($hoadonxuat->status == 0 && $hoadonxuat->khach_hang_id == \Auth::user()->khach_hang->id ) {
            $hoadonxuat->status = -1;
            $hoadonxuat->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được huỷ!');
        } else if($hoadonxuat->status == -2) {
            $hoadonxuat->status = -1;
            $hoadonxuat->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được huỷ!');
        }

        return redirect()->back()->with('loi', 'Lỗi huỷ đơn hàng!');
    }

    public function cancelShip($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = -2;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' giao hàng không thành công, chờ giao lại!');
    }

    public function getView($id)
    {
        $hoadonxuat = HoaDonXuat::find($id);
        $respone = array('data' => $hoadonxuat);

        $khach_hang = $hoadonxuat->khach_hang;
        $respone['data']['khach_hang'] = $khach_hang;

        foreach ($hoadonxuat->chi_tiet_hdx as $item) {
            $respone['data']['chi_tiet_hdx'] = $item;
            if($item->thuoc) {
                foreach ($item->thuoc as $item2) {
                }
            } else {
                $respone['data']['chi_tiet_hdx']['thuoc'] = "Không tồn tại";
            }
        }
        return $respone;
    }
}
