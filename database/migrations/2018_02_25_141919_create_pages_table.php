<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->enum('gallery_type', ['none', 'gallery', 'slider'])->comment('تعیین وضعیت نمایش عکس ها | اسلایدشو، گالری، هیچکدام')->default('none');
            $table->boolean('has_comment')->comment('آیا قابلیت ثبت نظر برای مطلب وجود دارد یا خبر');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->text('content');
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
        Schema::dropIfExists('pages');
    }
}
