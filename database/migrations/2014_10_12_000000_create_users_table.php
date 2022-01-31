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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("user");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_number')->nullable();
            $table->string('user_image')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1DLuBDtz2945mZR71wAT0WSkktlbwpF3chZ8omSwo5km6q6NfxZDKtx5TXWcrWz-rZDA&usqp=CAU');
            $table->string('user_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
