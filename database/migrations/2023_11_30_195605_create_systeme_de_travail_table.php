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
            $table->id();
            $table->foreignId('idAdmin')->references('id')->on('admin');
            $table->date('debuMatain');
            $table->date('finMatain');
            $table->date('debuMedi');
            $table->date('finMedi');
            $table->integer('nbConge');
            $table->timestamps();
            // define the foreign key
            // $table->foreignId('id')->references('id')->on('employé');
            
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