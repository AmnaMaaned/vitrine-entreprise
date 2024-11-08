<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_product', function (Blueprint $table) {
        
            $table->Integer('application_id')->unsigned();
            $table->Integer('product_id')->unsigned();
            $table->timestamps();
            // $table->foreign('application_id')->references('id')->on('applications');
            // $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_product');
    }
}
