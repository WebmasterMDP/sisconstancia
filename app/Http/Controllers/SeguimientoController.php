<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{

    public function index()
    {
        $datos = Seguimiento::all();
        return view('Administracion.seguimiento', compact('datos'));
    }

    public function create()
    {
        
    }

    public function store($id)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Seguimiento $seguimiento)
    {
        //
    }

    public function update(Request $request, Seguimiento $seguimiento)
    {
        //
    }
 
    public function destroy(Seguimiento $seguimiento)
    {
        //
    }
}
