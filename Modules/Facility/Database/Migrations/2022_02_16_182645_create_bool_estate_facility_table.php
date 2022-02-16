<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoolEstateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bool_estate_facility', function (Blueprint $table) {
            $table->unsignedTinyInteger('facility_id');
            $table->unsignedBigInteger('estate_id');
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
        Schema::dropIfExists('bool_estate_facility');
    }
}
