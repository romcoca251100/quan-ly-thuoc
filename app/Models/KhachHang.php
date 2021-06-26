<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khach_hangs';
    protected $fillable = [
        'user_id',
        'ho_ten',
        'ngay_sinh',
        'dia_chi',
        'dien_thoai',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hoa_don_xuat() {
        return $this->hasMany(HoaDonXuat::class, 'khach_hang_id');
    }
}
