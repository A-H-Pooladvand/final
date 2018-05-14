<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->unsignedSmallInteger('province_id');
            $table->unsignedSmallInteger('province_city_id');
            $table->unsignedInteger('place_id')->comment('محل برگزاری');
            $table->string('title', 100);
            $table->string('image', 120);
            $table->string('summary', 500);
            $table->text('content');
            $table->timestamp('releases_at')->nullable()->comment('تاریخ نمایش');
            $table->timestamp('starts_at')->nullable()->comment('تاریخ برگزاری رویداد');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade');
            $table->foreign('province_city_id')->references('id')->on('province_cities')->onUpdate('cascade');
            $table->foreign('place_id')->references('id')->on('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
