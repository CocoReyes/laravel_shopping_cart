<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100 );
            $table->longText('desc');
            $table->string('SKU',50);
            $table->bigInteger('productCategory_id')->unsigned();
            $table->foreign('productCategory_id')->references('id')
                  ->on('productCategorys');
            $table->bigInteger('productInventory_id')->unsigned();
            $table->foreign('productInventory_id')->references('id')
                        ->on('productInventorys');
            $table->decimal('price', 10, 2 );
            $table->bigInteger('discount_id')->unsigned();
            $table->foreign('discount_id')->references('id')
                  ->on('discounts');
            $table->timestamps();
            $table->dateTime('deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
