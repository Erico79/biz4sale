<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommiteeMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('committee_id')->unsigned();
            $table->foreign('committee_id')
                ->references('id')->on('committees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('masterfile_id')->unsigned();
            $table->foreign('masterfile_id')
                ->references('id')->on('masterfiles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('role')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('committee_members');
    }
}
