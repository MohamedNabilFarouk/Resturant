<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('branch_id');
            $table->bigInteger('user_id');

            $table->Integer('delivery_id')->default(0);

            $table->string('type')->default('delivery');
            $table->Integer('region_id')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->string('total');
            $table->string('status')->default('Pending');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();


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
        Schema::dropIfExists('orders');
    }
}
