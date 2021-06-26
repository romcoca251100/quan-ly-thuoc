<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuoc extends Model
{
    use HasFactory;
    protected $table = 'thuocs';
    protected $fillable = [
        'nhom_thuoc_id',
        'ten_thuoc',
        'slug',
        'so_luong',
        'don_gia_nhap',
        'don_gia_ban',
        'ghi_chu',
    ];

    public function nhom_thuoc() {
        return $this->belongsTo(NhomThuoc::class, 'nhom_thuoc_id');
    }

    public function chi_tiet_hdx() {
        return $this->hasMany(ChiTietHoaDonXuat::class, 'thuoc_id');
    }

    public function chi_tiet_hdn() {
        return $this->hasMany(ChiTietHoaDonNhap::class, 'thuoc_id');
    }
}
