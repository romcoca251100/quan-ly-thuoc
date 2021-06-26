<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'admin',
            'password' => bcrypt('12345678'),
            'role' => 1,
        ]);
        DB::table('nhan_viens')->insert([
            'user_id' => 1,
            'ho_ten' => 'Quản trị viên',
            'gioi_tinh' => 'Nam',
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => '54 Triều Khúc, Thanh Xuân, Hà Nội',
            'dien_thoai' => '0123456789',
        ]);
    }
}
