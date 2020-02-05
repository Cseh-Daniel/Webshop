<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermekeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termekeks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("kep");
            $table->string("nev");
            $table->intiger("ar");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termekeks');
    }
}
