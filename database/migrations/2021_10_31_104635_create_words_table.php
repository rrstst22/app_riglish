<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en');
            $table->string('jp');
            $table->integer('level_id')->unsigned();
            $table->integer('frequency_id')->unsigned();
            $table->integer('reputation')->default(0);
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('frequency_id')->references('id')->on('frequencies');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
