<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('logo')->default('default.png');
            $table->string('favicon')->default('favicon.png');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            // ========================= translatable data
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();

            $table->string('welcome_phrase_en')->nullable();
            $table->string('welcome_phrase_ar')->nullable();

            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();

            $table->string('city_en')->nullable();
            $table->string('city_ar')->nullable();

            $table->string('country_en')->nullable();
            $table->string('country_ar')->nullable();

            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_ar')->nullable();

            $table->string('meta_description_en')->nullable();
            $table->string('meta_description_ar')->nullable();

            $table->string('meta_keyword_en')->nullable();
            $table->string('meta_keyword_ar')->nullable();

            // ========================= end of translatable data

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
        Schema::dropIfExists('site_settings');
    }
}
