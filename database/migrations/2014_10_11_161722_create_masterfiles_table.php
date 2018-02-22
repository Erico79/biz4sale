<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('gender');
            $table->string('national_id',150)->unique();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('masterfiles')
                ->onDelete('no action');
            $table->string('phone_number');
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
        Schema::dropIfExists('masterfiles');
    }
}
