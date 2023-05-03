<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phong', function (Blueprint $table) {
            $table->id();
            $table->integer('nhatro_id'); // name_id
            $table->string('ten_tang'); // floor_name
            $table->string('ten_phong'); // room_name
            $table->string('dien_tich'); // area
            $table->string('gia'); // room_amount
            $table->integer('so_nguoi'); // max_member
            $table->integer('dv_dien'); // price_item_ele
            $table->integer('dv_nuoc'); // price_item_water
            $table->integer('dv_rac'); // price_item_trash
            $table->integer('dv_internet'); // price_item_wifi
            $table->integer('ngaylap_hoadon'); // circle_order
            $table->integer('han_dongtien'); // deadline_bill
            $table->integer('tinhtrang');
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
        Schema::dropIfExists('tbl_phong');
    }
}
