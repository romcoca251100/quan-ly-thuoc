<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDonNhap;
use App\Models\HoaDonXuat;
use App\Models\Thuoc;
use App\Models\NhomThuoc;

class ThongKeController extends Controller
{
    //
    public function index() {
        return view('admin.ThongKe.index');
    }
    
    public function loadChart() {
        $respone = ['success' => true,'data' => ''];
        $hdx = HoaDonXuat::orderBy('created_at', 'desc')->take(20)->get();
        foreach ($hdx as $item) {
            $respone['times'][] = date('d-m-Y', strtotime($item->updated_at));
            $respone['values'][] = $item->tong_tien;
        }
        return response()->json($respone, 200);
    }

    public function loadChart2() {
        $respone = ['success' => true,'data' => ''];
        $sp = Thuoc::select('nhom_thuoc_id', \DB::raw('count(*) as total'))->groupBy('nhom_thuoc_id')->pluck('total','nhom_thuoc_id')->all();

        foreach($sp as $key => $value) {
            $respone['times'][] = NhomThuoc::find($key)->ten_nhom_thuoc;
            $respone['values'][] = $value;
        }
        return response()->json($respone, 200);
    }
}
