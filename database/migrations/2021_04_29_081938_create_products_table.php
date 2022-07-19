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
            $table->string('name_en');
            $table->string('name_ar');

            $table->string('des_en');
            $table->string('des_ar');

            $table->string('image')->default('default.png');
            $table->integer('category_id');

            $table->string('price');
            $table->string('in_package_price')->nullable();
            $table->string('cal');
            $table->string('veg');
            $table->tinyInteger('promotional')->default('0');
            $table->tinyInteger('status')->default('1')->comment('1 => active, 0 => not active');
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
        Schema::dropIfExists('products');
    }
}
