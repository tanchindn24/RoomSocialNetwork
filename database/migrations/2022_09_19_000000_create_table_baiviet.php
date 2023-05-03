<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_baiviet', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->string('slug');
            $table->text('noi_dung');
            $table->integer('so_dien_thoai');
            $table->string('gia');
            $table->string('dien_tich');
            $table->integer('luot_xem')->default(0);
            $table->string('dia_chi');
            $table->string('Latitude_Longitude')->nullable();
            $table->string('tienich');
            $table->string('hinh_anh')->default('no-images-baiviet.jpg');
            $table->integer('chutro_id');
            $table->integer('danhmuc_id');
            $table->integer('quanhuyen_id')->nullable();
            $table->integer('trang_thai')->default(1);
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
        Schema::dropIfExists('tbl_baiviet');
    }
}
