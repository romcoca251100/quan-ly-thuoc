<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    //
    public function index() {
        return view('admin.ThongKe.index');
    }
}
