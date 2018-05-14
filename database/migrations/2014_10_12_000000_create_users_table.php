<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100)->index();
            $table->string('family', 100)->index();
            $table->string('email', 100)->unique()->index();
            $table->string('password', 150);
            $table->boolean('is_active')->default(false)->comment('فعال یا غیرفعال بودن اکانت');

            $table->unsignedSmallInteger('province_id')->nullable();
            $table->unsignedSmallInteger('province_city_id')->nullable();

            $table->string('first_address', 500)->nullable();
            $table->string('second_address', 500)->nullable();
            $table->enum('education', ['diploma', 'associate', 'bachelor', 'master', 'doctoral', 'post-doc'])->nullable();
            $table->string('birth_certificate', 20)->nullable();
            $table->string('national_id', 10)->index()->nullable();
            $table->string('biography', 1000)->nullable();
            $table->date('birthday')->nullable();
            $table->string('artwork', 1000)->nullable();
            $table->string('scientific_document', 500)->nullable();

            $table->string('verifyToken', 50)->nullable();
            $table->string('username', 100)->index()->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('mobile', 30)->index()->nullable();
            $table->string('phone', 30)->index()->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
