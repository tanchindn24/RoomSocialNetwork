<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('house_id');
            $table->foreign('house_id')->references('id')->on('house')->onDelete('cascade');
            $table->string('number_room');
            $table->integer('numerical_order')->comment('số thứ tự');
            $table->integer('price');
            $table->integer('height');
            $table->integer('width');
            $table->integer('maximum_number_of_people');
            $table->tinyInteger('rent_with')->comment('cho nam, nữ thuê hoặc cả 2');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
