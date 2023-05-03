<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMDienNuocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dien_nuoc', function (Blueprint $table) {
            $table->id();
            $table->integer('chutro_id');
            $table->integer('hopdong_id');
            $table->integer('loai');
            $table->integer('so_cu');
            $table->integer('so_moi');
            $table->date('ngaynhap');
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
        Schema::dropIfExists('tbl_dien_nuoc');
    }
}
