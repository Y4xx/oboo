<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeCongeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_conge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datedebut');
            $table->date('datefin');
            $table->integer('nbjourconge');
            $table->string('status');
            $table->string('remaeque', 255);
            // define the foreign key
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
        Schema::dropIfExists('demande_conge');
    }
}
