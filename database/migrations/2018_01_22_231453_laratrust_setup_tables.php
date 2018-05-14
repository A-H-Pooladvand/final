<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class LaratrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 191)->unique();
            $table->string('display_name', 191)->nullable();
            $table->string('description', 191)->nullable();
            $table->timestamps();
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedTinyInteger('title_id');
            $table->string('name', 191)->unique();
            $table->string('display_name', 191)->nullable();
            $table->string('description', 191)->nullable();
            $table->timestamps();

            $table->foreign('title_id')->references('id')->on('permission_titles')->onUpdate('cascade');
        });

        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedMediumInteger('role_id');
            $table->unsignedMediumInteger('user_id');
            $table->string('user_type', 191);

            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade');

            $table->primary(['user_id', 'role_id', 'user_type']);
        });

        // Create table for associating permissions to users (Many To Many Polymorphic)
        Schema::create('permission_user', function (Blueprint $table) {
            $table->unsignedMediumInteger('permission_id');
            $table->unsignedMediumInteger('user_id');
            $table->string('user_type', 191);

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade');

            $table->primary(['user_id', 'permission_id', 'user_type']);
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedMediumInteger('permission_id');
            $table->unsignedMediumInteger('role_id');

            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
    }
}
