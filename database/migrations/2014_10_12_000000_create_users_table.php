<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('masterfile_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->boolean('phone_verified')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->integer('role_id')->unsigned();
            $table->foreign('masterfile_id')
                ->references('id')->on('masterfiles')
                ->onUpdate('cascade')->onDelete('no action');
            $table->rememberToken();
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('no action');
            $table->timestamps();
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
