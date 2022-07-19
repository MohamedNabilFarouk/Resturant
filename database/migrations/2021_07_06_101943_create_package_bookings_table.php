<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_bookings', function (Blueprint $table) {
            $table->id();

            $table->integer('package_id'); // packages table
            $table->integer('user_id'); // users table
            $table->integer('branch_id'); // branches table

            $table->string('type')->default('out');
            $table->boolean('with_service')->default(0);
            $table->string('name');
            $table->string('phone');
            $table->text('address')->nullable();

            $table->string('date')->comment('date of reservation');
            $table->text('note')->nullable();
            $table->double('total');
            $table->tinyInteger('is_paid')->default('0');
            

            $table->string('status')->default('Pending');

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
        Schema::dropIfExists('package_bookings');
    }
}
