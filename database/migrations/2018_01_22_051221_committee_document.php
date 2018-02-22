<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommitteeDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->unsigned()->nullable();
            $table->foreign('session_id')
                ->references('id')->on('sessions')->onUpdate('cascade')->onDelete('no action');
            $table->integer('committee_doc_category')->unsigned();
            $table->foreign('committee_doc_category')
                ->references('id')
                ->on('committee_doc_categories')
                ->onUpdate('cascade')->onDelete('no action');
            $table->integer('committee')->unsigned()->nullable();
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
        Schema::dropIfExists('committee_documents');
    }
}
