<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentespdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanentespdata', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('user_id');
            $table->double('temperature');
            $table->double('humidity');
            $table->double('moisture');
            $table->double('light');
            $table->double('rain');        
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permanentespdata');
    }
}
