<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropStatusColumnAtEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estates', function (Blueprint $table) {
            $table->dropColumn('status');
            // $table->enum('status', ['approved', 'pending_approval', 'not_approved'])->default('pending_approval');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('status_column_at_estates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
        });
    }
}
