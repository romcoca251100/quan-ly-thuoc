<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_xuats', function (Blueprint $table) {
            $table->id();
            $table->integer('nhan_vien_id')->nullable();
            $table->integer('khach_hang_id');
            $table->datetime('ngay_lap')->nullable();
            $table->double('tong_tien');
            $table->integer('status')->defaut(0);
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
        Schema::dropIfExists('hoa_don_xuats');
    }
}
