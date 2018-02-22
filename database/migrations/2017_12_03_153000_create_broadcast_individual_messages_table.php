<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastIndividualMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcast_individual_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterfile_id')->unsigned();
            $table->foreign('masterfile_id')->references('id')->on('masterfiles')
                ->onUpdate('cascade')->onDelete('no action');
            $table->string('document_type');
            $table->bigInteger('committee_document_id')->unsigned()->nullable();
            $table->integer('document_id')->unsigned()->nullable();
            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('broadcast_id')->unsigned()->nullable();
            $table->foreign('broadcast_id')->references('id')->on('broadcasts')
                ->onUpdate('cascade')->onDelete('no action');
            $table->integer('broadcast_type')->unsigned()->nullable();
            $table->foreign('broadcast_type')->references('id')->on('broadcast_types')
                ->onUpdate('cascade')->onDelete('no action');
            $table->boolean('sent')->default(false);
            $table->boolean('received')->default(false);
            $table->boolean('read')->default(false);
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
        Schema::dropIfExists('broadcast_individual_messages');
    }
}
