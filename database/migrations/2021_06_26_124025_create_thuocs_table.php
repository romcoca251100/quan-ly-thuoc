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
            $table->bigInteger('so_luong')->default(0);
            $table->bigInteger('da_ban')->default(0);
            $table->double('don_gia_nhap')->default(0);
            $table->double('don_gia_ban')->default(0);
            $table->text('ghi_chu')->nullable();
            $table->text('hinh_anh')->nullable()->default('upload/images/thuoc/no-image.png');
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
