<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemeDeAbsenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systeme_de_absence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datedebut');
            $table->date('datefin');
            $table->integer('nbjourconge');
            $table->boolean('certifier');
            $table->string('remaeque');
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
        Schema::dropIfExists('systeme_de_absence');
    }
}
