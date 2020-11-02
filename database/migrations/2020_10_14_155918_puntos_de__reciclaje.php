<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PuntosDeReciclaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('Puntos_de_Recoleccion', function(Blueprint $table){            
            $table->bigIncrements("idPunto");
            $table->string("tipo_de_basura");
            $table->string("direccion");            
            $table->string("hora_apertura");
            $table->string("hora_cierre");
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
        Schema::dropIfExists('Puntos_de_Recoleccion');
    }
}
