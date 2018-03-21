<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterfile_id')->unsigned();
            $table->text('step_one');
            $table->text('step_two');
            $table->string('business_status');
            $table->string('property_status');
            $table->integer('property_asking_price_id')->unsigned();
            $table->integer('property_cash_flow_id')->unsigned();
            $table->integer('property_sales_revenue_id')->unsigned();
            $table->boolean('complete')->default(false);
            $table->foreign('property_asking_price_id')
                ->references('id')->on('property_asking_prices')
                ->onUpdate('cascade');
            $table->foreign('property_cash_flow_id')
                ->references('id')->on('property_cash_flows')
                ->onUpdate('cascade');
            $table->foreign('property_sales_revenue_id')
                ->references('id')->on('property_sales_revenues')
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
        Schema::table('business_listings', function (Blueprint $table) {
            //
        });
    }
}
