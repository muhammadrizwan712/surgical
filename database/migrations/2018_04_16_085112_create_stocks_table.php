<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('size_id')->unsigned();

            $table->string('pquantity');
          
           $table->integer('price');
           $table->integer('total');
        
            $table->string('status_cleaning')->nullable();
            $table->string('status_coating')->nullable();
            $table->string('status_finish')->nullable();
            $table->integer('color_id')->unsigned();
            $table->integer('serial_id')->unsigned();
            $table->integer('customer_id')->unsigned();
  $table->foreign('color_id')->references('id')->on('colors')
                ->onUpdate('cascade')->onDelete('cascade');

$table->foreign('serial_id')->references('id')->on('serials')
                ->onUpdate('cascade')->onDelete('cascade');

$table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');

$table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('size_id')->references('id')->on('sizes')
                ->onUpdate('cascade')->onDelete('cascade');

  $table->string('date');
$table->string('status_invoice')->nullable();

            


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
        Schema::dropIfExists('stocks');
    }
}
