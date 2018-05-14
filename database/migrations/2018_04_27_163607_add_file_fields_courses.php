<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileFieldsCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetings', function (Blueprint $table){
            $table->string('file', 150)->nullable()->after('image');
            $table->string('sound', 150)->nullable()->after('file');
            $table->text('sound_link')->after('sound')->comment('لینک فایل صوتی');
            $table->string('video', 150)->nullable()->after('sound_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table){
            $table->dropColumn(['file', 'sound', 'sound_link', 'video']);
        });
    }
}
