<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoundLinkFieldAudibles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audibles', function (Blueprint $table) {
           $table->text('sound_link')
               ->after('sound')->comment('لینک فایل صوتی');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audibles', function (Blueprint $table){
            $table->dropColumn('sound_link');
        });
    }
}
