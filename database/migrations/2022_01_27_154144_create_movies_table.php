<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name');
            $table->string('movie_rate');
            $table->string('movie_description');
            $table->string('movie_image');
            $table->string('movie_trailer');
            $table->string('movie_price');
            $table->string('movie_cinemas');
            $table->string('movie_new_price')->nullable();
            $table->boolean('movie_sale_status');
            $table->boolean('movie_is_new');
            $table->string('movie_daily_show');
            $table->foreignId('category_id')
            ->unsigned()
            ->references('id')
            ->on('categories')
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
        Schema::dropIfExists('movies');
    }
}
