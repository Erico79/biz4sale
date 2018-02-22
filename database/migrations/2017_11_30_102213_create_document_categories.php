<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('root_category')->unsigned()->nullable();
            $table->foreign('root_category')
                ->references('id')->on('document_categories')
                ->onUpdate('cascade')->onDelete('no action');
            $table->string('category_icon')->nullable();
            $table->string('category_name');
            $table->string('category_code');
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
        Schema::dropIfExists('document_categories');
        //
    }
}
