<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->unsignedBigInteger('total_price')->nullable();
            $table->unsignedBigInteger('mortgage_price')->nullable();
            $table->unsignedBigInteger('rent_price')->nullable();
            $table->unsignedBigInteger('neighborhood_id');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->text('address');
            $table->float('area');
            $table->integer('year_of_construction');
            $table->integer('status')->default(0);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->unsignedTinyInteger('user_id');
            $table->integer('views')->default(0);
//            $table->unsignedBigInteger('use_type_id');
            $table->unsignedBigInteger('use_type_property_id');
            $table->string('main_picture')->nullable();

            $table->timestamps();

            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('use_type_id')->references('id')->on('use_types');
            $table->foreign('use_type_property_id')->references('id')->on('use_type_properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
