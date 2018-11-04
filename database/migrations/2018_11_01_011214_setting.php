<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Setting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siteName_ar');
            $table->string('siteName_en');
            $table->string('logo')->nullable(); 
            $table->string('icon')->nullable();
            $table->string('email')->nullable();
            $table->string('main_lang')->default('ar');
            $table->longtext('description')->nullable();
            $table->longtext('keywords')->nullable();
            $table->enum('status',['open','close'])->default('open')->nullable();

            $table->longtext('message_maintenance')->nullable();



            
                      
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
         Schema::dropIfExists('Setting');
    }
}
