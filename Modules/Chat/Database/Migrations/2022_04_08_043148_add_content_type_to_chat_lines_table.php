<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentTypeToChatLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_lines', function (Blueprint $table) {

            $table->enum('content_type', ['text', 'file'])->default('text');
            $table->renameColumn('message', 'content');
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

            $table->dropColumn('content_type');
        });
    }
}
