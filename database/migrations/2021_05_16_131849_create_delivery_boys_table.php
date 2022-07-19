<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id'); // users table
            $table->tinyInteger('status')->default(0)->comment('0 => Not Active , 1 => free , 2 => Busy');
            $table->boolean('is_staff')->default(1);

            $table->string('vehicle_no')->comment('Number of document');
            $table->string('driving_License_no')->comment('Number of document');
            $table->string('id_proof_no')->comment('Number of document');

            $table->string('criminal_records_certificate')->comment('scan or photo');
            $table->string('drugs_analysis')->comment('scan or photo');

            $table->string('License_front')->comment('scan or photo');
            $table->string('License_back')->comment('scan or photo');
            $table->string('car_License_front')->comment('scan or photo');
            $table->string('car_License_back')->comment('scan or photo');

            $table->string('proof_front')->comment('scan or photo');
            $table->string('proof_back')->comment('scan or photo');

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
        Schema::dropIfExists('delivery_boys');
    }
}
