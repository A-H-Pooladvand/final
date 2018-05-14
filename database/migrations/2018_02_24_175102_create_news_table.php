<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->enum('status', ['publish', 'draft'])->default('publish')->comment('منتشر شده یا پیشنویس');
            $table->string('title', 100);
            $table->string('summary', 500);
            $table->string('image', 120);
            $table->text('content');
            $table->timestamp('publish_at')->comment('تاریخ انتشار');
            $table->timestamp('expire_at')->nullable()->comment('تاریخ انقضا');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
