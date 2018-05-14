<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->unsignedSmallInteger('province_id');
            $table->unsignedSmallInteger('province_city_id');
            $table->string('title', 100)->index();
            $table->enum('gender', ['male', 'female', 'both']);
            $table->string('image', 120);
            $table->string('first_address', 700);
            $table->string('second_address', 700)->nullable();
            $table->string('first_phone', 20)->nullable();
            $table->string('second_phone', 20)->nullable();
            $table->float('map_lat', 9, 7)->nullable();
            $table->float('map_lng', 9, 7)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade');
            $table->foreign('province_city_id')->references('id')->on('province_cities')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
