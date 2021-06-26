<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'hoa_don_nhaps';
    protected $fillable = [
        'nhan_vien_id',
        'ngay_lap',
        'tong_tien',
    ];

    public function nhan_vien() {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }

    public function chi_tiet_hdn() {
        return $this->hasMany(ChiTietHoaDonNhap::class, 'hoa_don_nhap_id');
    }
}
