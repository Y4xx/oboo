<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_employes', function (Blueprint $table) {
            $table->string('nomtype');
            $table->integer('duredetravailleparjour');
            $table->integer('salaire');
            // define the foreign key;
            $table->foreignId('id')->references('id')->on('employé');
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
        Schema::dropIfExists('type_employes');
    }
}
