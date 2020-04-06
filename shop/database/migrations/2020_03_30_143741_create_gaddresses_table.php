<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaddresses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->String('nev');
          $table->timestamps();
          $table->String("utca");
          $table->String("hsz");
          $table->String("easz")->nullable();
          $table->String("varos");
          $table->String("irszam");
          $table->String("phone");
          $table->String("email");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gaddresses');
    }
}
