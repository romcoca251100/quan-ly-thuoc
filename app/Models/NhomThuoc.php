<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomThuoc extends Model
{
    use HasFactory;
    protected $table = 'nhom_thuocs';
    protected $fillable = [
        'ten_nhom_thuoc',
        'slug',
    ];

    public function thuoc() {
        return $this->hasMany(Thuoc::class, 'nhom_thuoc_id');
    }
}
