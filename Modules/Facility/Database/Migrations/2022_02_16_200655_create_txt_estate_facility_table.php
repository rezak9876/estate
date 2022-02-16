<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTxtEstateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('txt_estate_facility', function (Blueprint $table) {
            $table->unsignedBigInteger('facility_id');
            $table->unsignedBigInteger('estate_id');
            $table->string('value')->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('txt_estate_facility');
    }
}
