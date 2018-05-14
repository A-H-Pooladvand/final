<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilesFieldsCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table){
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
        Schema::table('courses', function (Blueprint $table){
            $table->dropColumn(['sound', 'sound_link', 'video']);
        });
    }
}
