<?php
namespace App\Models;
class Cart
{
    public $thuoc = null;
    public $tongGia = 0;
    public $tongSoluong = 0;

    public function __construct($cart) {
        if ($cart) {
            $this->thuoc = $cart->thuoc;
            $this->tongGia = $cart->tongGia;
            $this->tongSoluong = $cart->tongSoluong;
        }
    }

    public function addCart($thuoc, $id) {
        $thuocInfo = ['id' => $thuoc->id, 'nhom_thuoc' => $thuoc->nhom_thuoc->ten_nhom_thuoc, 'ten_thuoc' => $thuoc->ten_thuoc, 'don_gia_ban'=>$thuoc->don_gia_ban];
        $newThuoc = ['so_luong' => 0, 'don_gia_ban' => $thuoc->gia, 'thuocInfo' => $thuoc];
        if ($this->thuoc) {
            if (array_key_exists($id, $this->thuoc)) {
                $newThuoc = $this->thuoc[$id];
            }
        }
        $newThuoc['so_luong']++;
        $newThuoc['don_gia_ban'] = $newThuoc['so_luong'] * $thuoc->don_gia_ban;
        $this->thuoc[$id] = $newThuoc;
        $this->tongGia += $thuoc->don_gia_ban;
        $this->tongSoluong++;
    }

    public function deleteItemCart($id) {
        $this->tongSoluong -= $this->thuoc[$id]['so_luong'];
        $this->tongGia -= $this->thuoc[$id]['don_gia_ban'];
        unset($this->thuoc[$id]);
    }

    public function UpdateItemCart($id, $tong) {
        $this->tongSoluong -= $this->thuoc[$id]['so_luong'];
        $this->tongGia -= $this->thuoc[$id]['don_gia_ban'];

        $this->thuoc[$id]['so_luong'] = $tong;
        $this->thuoc[$id]['don_gia_ban'] = $tong * $this->thuoc[$id]['thuocInfo']->don_gia_ban;

        $this->tongSoluong += $this->thuoc[$id]['so_luong'];
        $this->tongGia += $this->thuoc[$id]['don_gia_ban'];
    }
}
