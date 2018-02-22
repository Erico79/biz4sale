<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->unsigned()->nullable();
            $table->integer('plenary_sitting_id')->unsigned();
            $table->foreign('plenary_sitting_id')->references('id')
                ->on('plenary_sittings')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('session_id')
                ->references('id')->on('sessions')->onUpdate('cascade')->onDelete('no action');
            $table->integer('document_category')->unsigned();
            $table->foreign('document_category')
                ->references('id')
                ->on('document_categories')
                ->onUpdate('cascade')->onDelete('no action');
            $table->integer('user_group')->unsigned()->nullable();
            $table->string('document_path');
            $table->dateTime('upload_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
