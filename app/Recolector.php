<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PuntoRecoleccion;
use App\DetalleRecolector;
use Illuminate\Support\Facades\DB;

class Recolector extends Model
{
    protected $table = "Recolectores";
    protected $fillable = ['nombre', 'dias'];
    protected $primaryKey = 'idRecolector';

    public function getPuntos()
    {
        $puntos = DB::select(
            'SELECT puntos_de_recoleccion.direccion, puntos_de_recoleccion.idPunto, puntos_de_recoleccion.tipo_de_basura
            FROM puntos_de_recoleccion
            INNER JOIN detalle_recolector
            ON puntos_de_recoleccion.idPunto = detalle_recolector.id_PuntoReciclaje
            INNER JOIN recolectores
            ON detalle_recolector.id_Recolector = recolectores.idRecolector
            WHERE recolectores.idRecolector=' . $this->idRecolector
        );
        return $puntos;
    }

}
