

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
            $table->time('tempsMatain-1')->default('00:00');
            $table->time('tempsMatain-2')->default('00:00');
            $table->time('tempsMedi-1')->default('00:00');
            $table->time('tempsMedi-2')->default('00:00');
            $table->date('dateDePointage');
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
        Schema::dropIfExists('pointage');
    }
}
