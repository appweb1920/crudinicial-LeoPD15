<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleRecolector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('Detalle_Recolector', function(Blueprint $table){
            $table->unsignedBigInteger("id_PuntoReciclaje");
            $table->unsignedBigInteger("id_Recolector");
            $table->timestamps();
            $table->foreign('id_PuntoReciclaje')->references('idPunto')->on('Puntos_de_Recoleccion')->onDelete('cascade');
            $table->foreign('id_Recolector')->references('idRecolector')->on('Recolectores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Detalle_Recolector');
    }
}
