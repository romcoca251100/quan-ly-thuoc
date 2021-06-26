<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonXuat extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_hoa_don_xuats';
    protected $fillable = [
        'hoa_don_xuat_id',
        'thuoc_id',
        'so_luong',
        'don_gia',
        'giam_gia',
        'thanh_tien',
    ];

    public function hoa_don_xuat() {
        return $this->belongsTo(HoaDonXuat::class, 'hoa_don_xuat_id');
    }

    public function thuoc() {
        return $this->belongsTo(Thuoc::class, 'thuoc_id');
    }
}
