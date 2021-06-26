<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuocs', function (Blueprint $table) {
            $table->id();
            $table->integer('nhom_thuoc_id');
            $table->string('ten_thuoc');
            $table->string('slug');
            $table->bigInteger('so_luong');
            $table->double('don_gia_nhap');
            $table->double('don_gia_ban');
            $table->text('ghi_chu');
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
        Schema::dropIfExists('thuocs');
    }
}
