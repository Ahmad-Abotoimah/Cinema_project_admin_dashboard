<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('seats');
            $table->string('show_time');
            $table->string('book_price');
            $table->foreignId('movie_id')
            ->unsigned()
            ->references('id')
            ->on('movies')
            ->onDelete('cascade');

            $table->foreignId('user_id')
            ->unsigned()
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
