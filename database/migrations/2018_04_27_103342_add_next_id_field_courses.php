<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNextIdFieldCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table){
            $table->unsignedInteger('next_id')->nullable()->after('id');
            $table->unsignedInteger('previous_id')->nullable()->after('next_id');

            $table->foreign('next_id')->references('id')->on('courses');
            $table->foreign('previous_id')->references('id')->on('courses');
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
            $table->dropColumn(['next_id', 'previous_id']);
        });
    }
}
