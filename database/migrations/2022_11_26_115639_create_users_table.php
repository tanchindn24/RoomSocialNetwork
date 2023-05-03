<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('provider');
            $table->string('provider_id');
            $table->date('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('cccd')->nullable();
            $table->date('ngay_cap_cccd')->nullable();
            $table->string('noi_cap_cccd')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->default('no-avatar.png');
            $table->integer('roles')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('tbl_user');
    }
}
