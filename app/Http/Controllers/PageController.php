<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuoc;
use App\Models\NhomThuoc;

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

    
}
