<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('user_id');
            $table->unsignedTinyInteger('chat_id');
            $table->string('content')->nullable();
            $table->enum('send_status', ['send', 'received', 'seen'])->default('send');
            $table->enum('content_type', ['text', 'file'])->default('text');



            $table->unsignedBigInteger('file_id')->nullable();

            $table->foreign('file_id')->references('id')->on('files');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chat_id')->references('id')->on('chats');
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
        Schema::dropIfExists('chat_lines');
    }
}
