

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idemploye')->references('id')->on('employes');
            $table->time('tempsMatain_1')->nullable();
            $table->time('tempsMatain_2')->nullable();
            $table->time('tempsMedi_1')->nullable();
            $table->time('tempsMedi_2')->nullable();
            $table->date('dateDePointage');
            $table->timestamps();
        });
    }
    // $table->time('tempsMatain_1')->default('00:00');
    // $table->time('tempsMatain_2')->default('00:00');
    // $table->time('tempsMedi_1')->default('00:00');
    // $table->time('tempsMedi_2')->default('00:00');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pointage');
    }
}
