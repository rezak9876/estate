<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendStatusToChatLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_lines', function (Blueprint $table) {
            $table->enum('send_status', ['send', 'received', 'seen'])->default('send');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_lines', function (Blueprint $table) {
            $table->dropColumn('send_status');
        });
    }
}
