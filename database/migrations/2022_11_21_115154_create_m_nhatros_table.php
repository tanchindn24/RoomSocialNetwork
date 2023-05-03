<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMNhatrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhatro', function (Blueprint $table) {
            $table->id();
            $table->integer('chutro_id');
            $table->integer('loaiphong_id'); // category
            $table->string('ten_nhatro'); // name
            $table->string('so_tang'); // count_floor
            $table->string('so_phong'); // room_total
            $table->integer('tinhthanh_id'); // province_id
            $table->integer('quanhuyen_id'); // district_id
            $table->integer('xaphuong_id'); // ward_id
            $table->string('dia_chi'); // detail_address
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
        Schema::dropIfExists('tbl_nhatro');
    }
}
