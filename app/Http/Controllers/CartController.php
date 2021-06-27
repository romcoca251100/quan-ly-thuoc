<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuoc;
use App\Models\NhomThuoc;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function getCart() {
        return view('pages.gio-hang');
    }

    public function getCartTemp() {
        return view('pages.layouts.cart');
    }

    public function addCart(Request $request, $id) {
        $thuoc = Thuoc::find($id);
        if ($thuoc != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($thuoc, $id);

            $request->session()->put('Cart', $newCart);
        }
        view('pages.layouts.cart', compact('newCart'));
        return redirect()->back();
    }

    public function getDelete(Request $request, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);

        if(Count($newCart->thuoc) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id, $tong) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $tong);

        $request->Session()->put('Cart', $newCart);
       
        return redirect()->route('cart');
    }
}
