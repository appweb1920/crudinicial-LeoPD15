<?php

namespace App\Http\Controllers;

use App\Recolector;
use Illuminate\Http\Request;


class RecolectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen y envían todos los recolectores a la vista
        $r = Recolector::all();
        return view('recolector')->with('recolectores',$r);
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
    public function store(Request $recolectorNuevo)
    {
        //Se guarda un nuevo recolector
        $recolector = new Recolector;
        $recolector->nombre = $recolectorNuevo->nombre;
        $recolector->dias = $recolectorNuevo->dias;
        $recolector->save();
        return redirect('/recolector');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recolector  $recolector
     * @return \Illuminate\Http\Response
     */
    public function show(Recolector $recolector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recolector  $recolector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Se encuentra el recolector a editar
        $r = Recolector::find($id);
        return view('editaRecolector')->with('recolector',$r);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recolector  $recolector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Se edita el recolector en caso de existir
        $r = Recolector::find($request->idRecolector);
        if(!is_null($r)){
            $r->nombre = $request->nombre;
            $r->dias = $request->dias;
            $r->save();
        }
        return redirect('/recolector');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recolector  $recolector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $r = Recolector::find($id);
        $r ->delete();
        return redirect('/recolector');
    }
}
