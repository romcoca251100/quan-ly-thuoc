<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhan_viens';
    protected $fillable = [
        'user_id',
        'ho_ten',
        'gioi_tinh',
        'ngay_sinh',
        'dia_chi',
        'dien_thoai',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hoa_don_xuat() {
        return $this->hasMany(HoaDonXuat::class, 'nhan_vien_id');
    }
}
