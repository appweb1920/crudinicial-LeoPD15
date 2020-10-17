<?php

namespace App\Http\Controllers;

use App\DetalleRecolector;
use Illuminate\Http\Request;
use App\Recolector;
use App\PuntoRecoleccion;
use Illuminate\Support\Facades\DB;

class DetalleRecolectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recolectores = Recolector::all();
        return view('detalleRecolector')->with('recolectores', $recolectores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetalleRecolector  $detalleRecolector
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleRecolector $detalleRecolector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetalleRecolector  $detalleRecolector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $r = Recolector::find($id);
        $puntosN = DB::select(
            'SELECT puntos_de_recoleccion.idPunto, puntos_de_recoleccion.tipo_de_basura, puntos_de_recoleccion.direccion
            FROM puntos_de_recoleccion
            WHERE puntos_de_recoleccion.idPunto NOT IN(
                SELECT puntos_de_recoleccion.idPunto
                FROM detalle_recolector 
                INNER JOIN puntos_de_recoleccion
                ON detalle_recolector.id_puntoReciclaje = puntos_de_recoleccion.idPunto
                INNER JOIN recolectores
                ON detalle_recolector.id_Recolector = recolectores.idRecolector
                WHERE  recolectores.idRecolector='.$id.'
            )
            ');
        return view('editaDetalles')->with('recolector', $r)->with('puntosSin', $puntosN);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleRecolector  $detalleRecolector
     * @return \Illuminate\Http\Response
     */
    public function update($idR, $idP)
    {
        $detalle = new DetalleRecolector;
        $detalle->id_Recolector = $idR;
        $detalle->id_PuntoReciclaje = $idP;
        $detalle->save();
        return redirect('/detalles/editar/'.$idR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleRecolector  $detalleRecolector
     * @return \Illuminate\Http\Response
     */
    public function destroy($idR, $idP)
    {
        DB::table('detalle_recolector')->where('id_Recolector', $idR)->where('id_PuntoReciclaje', $idP)->delete();
        return redirect('/detalles/editar/'.$idR);
    }
}
