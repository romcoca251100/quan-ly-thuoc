<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_hoa_don_nhaps';
    protected $fillable = [
        'hoa_don_nhap_id',
        'thuoc_id',
        'so_luong',
        'don_gia',
        'thanh_tien',
    ];

    public function hoa_don_nhap() {
        return $this->belongsTo(HoaDonNhap::class, 'hoa_don_nhap_id');
    }

    public function thuoc() {
        return $this->belongsTo(Thuoc::class, 'thuoc_id');
    }
}
