<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessListingCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_listing_category', function (Blueprint $table) {
            $table->integer('business_listing_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('business_listing_id')
                ->references('id')->on('business_listings')
                ->onUpdate('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_listing_category');
    }
}
