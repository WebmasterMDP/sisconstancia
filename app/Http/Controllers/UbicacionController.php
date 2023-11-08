<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UbicacionController extends Controller
{

    public function index()
    {
        $datos = Ubicacion::all();
        return view('administracion/ubicacion/list', compact('datos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $datos = new Ubicacion();
        $datos->zona = $request->zonaCreate;
        $datos->nombreUbicacion = $request->nombreUbicacionCreate;
        $datos->observacion = 'CREADO';
        $datos->usuario = Auth::user()->name;
        $datos->save();
        return redirect()->route('ubicacion.index')->with('ubicacion','create');
    }

    public function show(Ubicacion $ubicacion)
    {
        //
    }

    public function edit(Ubicacion $ubicacion)
    {
        $datos = Ubicacion::findorFail($ubicacion->id);
        return view('administracion/ubicacion/edit', compact('datos'));
    }

    public function update($id, Request $request)
    {
        $datos = Ubicacion::findorFail($id);
        $datos->zona = $request->zonaUpdate;
        $datos->nombreUbicacion = $request->nameUpdate;
        $datos->observacion = 'ACTUALIZADO';
        $datos->usuario = Auth::user()->name;
        $datos->save();
        return redirect()->route('ubicacion.index')->with('ubicacion','update');
    }

    public function destroy($id)
    {
        /* $datos = Ubicacion::findorFail($id);
        $datos->delete(); */
        return redirect()->route('ubicacion.index')->with('ubicacion','delete');
    }

    public function getSector($zona){
        $response = Ubicacion::where(['zona' => $zona])
                    ->get();
        return $response;
    }

    public function getRegistros(){
        $query = Ubicacion::select('*')->get();
        echo json_encode($registros, JSON_UNESCAPED_UNICODE);
        /* return $query->result(); */
    }

}
