<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemeDeTravailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systeme_de_travail', function (Blueprint $table) {
            $table->integer('nbjour');
            $table->integer('nbheure');
            $table->boolean('avecsamedi');
            $table->integer('nbheuresamedi');
            $table->timestamps();
            // define the foreign key
            $table->foreignId('id')->references('id')->on('employé');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systeme_de_travail');
    }
}
