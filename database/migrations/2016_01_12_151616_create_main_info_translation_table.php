<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainInfoTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maininfo_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('keywords');
            $table->text('description');
            $table->string('lang');
            $table->integer('tid');
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
        Schema::drop('maininfo_trans');
    }
}
