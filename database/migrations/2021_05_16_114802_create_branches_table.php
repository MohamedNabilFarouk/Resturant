<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('area_en');
            $table->string('area_ar');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('phone');
            $table->integer('package_per_day')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1 => active, 0 => not active');

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
        Schema::dropIfExists('branches');
    }
}
