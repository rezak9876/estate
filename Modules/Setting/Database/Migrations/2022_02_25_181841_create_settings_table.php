<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('meta_description')->nullable();
            $table->string('themColor')->default('#fd832d');

            $table->string('logo')->nullable();
            $table->string('faIco')->nullable();
            $table->string('watermark')->nullable();
            $table->boolean('watermarkActive')->default(0);
            $table->string('watermarkPosition')->default('bottom-right');


            $table->longText('description')->nullable();
            $table->text('enamad')->nullable();


            $table->string('socialTelegram')->nullable();
            $table->string('socialInstagram')->nullable();
            $table->string('socialFacebook')->nullable();
            $table->string('socialTwitter')->nullable();
            $table->string('socialYoutube')->nullable();
            $table->string('socialWhatsapp')->nullable();
            $table->string('socialAparat')->nullable();



            $table->text('email')->nullable();
            $table->text('email2')->nullable();
            $table->text('email3')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->text('address3')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('fax')->nullable();
            $table->string('fax2')->nullable();
            $table->string('fax3')->nullable();

            $table->text('mobileWhatsup')->nullable();
            $table->boolean('mobileWhatsupStatus')->default(0);

            $table->longText('mapGoogle')->nullable();

            $table->boolean('maintenance')->default(0);




            $table->string('main_page_pic')->nullable();
            $table->string('search_page_pic')->nullable();


            
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
        Schema::dropIfExists('settings');
    }
}
