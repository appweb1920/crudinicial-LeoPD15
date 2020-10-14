<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoRecoleccion extends Model
{
    protected $table = "puntos_de_recoleccion";
    protected $fillable = ['tipoBasura', 'direccion', 'hora_apertura', 'hora_cierre'];
    protected $primaryKey = 'idPunto';
}
