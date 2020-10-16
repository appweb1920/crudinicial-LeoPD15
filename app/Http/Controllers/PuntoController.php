<?php

namespace App\Http\Controllers;

use App\PuntoRecoleccion;
use Illuminate\Http\Request;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntos = PuntoRecoleccion::all();
        return view('puntoRecoleccion')->with('puntos', $puntos);
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
    public function store(Request $puntoNuevo)
    {
        $punto = new PuntoRecoleccion;
        $punto->direccion = $puntoNuevo->direccion;
        $punto->tipo_de_basura = $puntoNuevo->tipo_de_basura;
        $punto->hora_apertura = $puntoNuevo->hora_apertura;
        $punto->hora_cierre = $puntoNuevo->hora_cierre;
        $punto->save();
        return redirect('/puntos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PuntoRecoleccion  $puntoRecoleccion
     * @return \Illuminate\Http\Response
     */
    public function show(PuntoRecoleccion $puntoRecoleccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PuntoRecoleccion  $puntoRecoleccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = PuntoRecoleccion::find($id);
        return view('editaPunto')->with('punto', $p);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PuntoRecoleccion  $puntoRecoleccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $punto)
    {
        $p = PuntoRecoleccion::find($punto->idPunto);
        if(!is_null($p)){
            $p->direccion = $punto->direccion;
            $p->tipo_de_basura = $punto->tipo_de_basura;
            $p->hora_apertura = $punto->hora_apertura;
            $p->hora_cierre = $punto->hora_cierre;
            $p->save();
        }
        return redirect('/puntos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PuntoRecoleccion  $puntoRecoleccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = PuntoRecoleccion::find($id);
        $p ->delete();
        return redirect('/puntos');
    }
}
