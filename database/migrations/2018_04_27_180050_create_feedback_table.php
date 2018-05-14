<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('user_id', false, true)->nullable()->default(null)->index()->comment('کاربر');
            $table->bigInteger('mobile', false, true)->nullable()->default(null)->index()->comment('تلفن همراه');
            $table->string('name', 100)->default('')->comment('نام');
            $table->string('title', 100)->default('')->comment('عنوان');
            $table->string('email', 100)->nullable()->default(null)->comment('پست الکترونیکی');
            $table->text('content')->comment('متن');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
