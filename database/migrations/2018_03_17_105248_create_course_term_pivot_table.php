<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTermPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_term', function (Blueprint $table) {
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('term_id');

            $table->primary(['course_id', 'term_id']);
            $table->index(['course_id', 'term_id']);

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('term_id')->references('id')->on('terms');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_term');
    }
}
