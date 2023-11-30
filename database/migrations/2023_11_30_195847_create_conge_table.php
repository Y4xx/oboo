<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datedebut');
            $table->date('datefin');
            $table->integer('nbjourconge');
            $table->integer('congerester');
            // define the foreign key
            $table->foreignId('iddemande')->references('id')->on('demande_conge');
            $table->foreignId('idemploye')->references('id')->on('employé');
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
        Schema::dropIfExists('conge');
    }
}
