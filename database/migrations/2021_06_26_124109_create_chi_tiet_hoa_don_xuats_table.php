<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don_xuats', function (Blueprint $table) {
            $table->id();
            $table->integer('hoa_don_xuat_id');
            $table->integer('thuoc_id');
            $table->bigInteger('so_luong');
            $table->double('don_gia');
            $table->double('giam_gia');
            $table->double('thanh_tien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don_xuats');
    }
}
