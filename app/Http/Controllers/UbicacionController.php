<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{

    public function index()
    {
        $datos = Ubicacion::all();
        return view('ubicacion/list', compact('datos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ubicacion $ubicacion)
    {
        //
    }

    public function edit(Ubicacion $ubicacion)
    {
        $datos = Ubicacion::findorFail($ubicacion->id);
        return view('ubicacion/edit', compact('datos'));
    }

    public function update(Request $request, Ubicacion $ubicacion)
    {
        //
    }

    public function destroy(Ubicacion $ubicacion)
    {
        //
    }
}
