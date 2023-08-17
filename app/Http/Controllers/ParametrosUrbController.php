<?php

namespace App\Http\Controllers;

use App\Models\ParametrosUrb;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class ParametrosUrbController extends Controller
{

    public function index()
    {
        $datos = ParametrosUrb::all();
        return view('modulo4/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo4/add');
    }

    public function store(Request $request)
    {
        $usuario = auth()->user()->username;
        
        $data = new ParametrosUrb();
        $data->titular = request('name');
        $data->numdoc = request('ruc');
        $data->expediente = request('expediente');
        $data->fecha_emision = request('fechaEmision');
        $data->direccion = request('direccion');
        $data->partida = request('numPartida');
        $data->num_informe = request('numInforme');
        $data->fecha_vencimiento = request('fechaVencimiento');

        $data->user = $usuario;
        $data->print = 0;
        $data->estado = 1;
        $data->save();

        $id = ParametrosUrb::latest('id')->value('id') ?? 1;

        $data = new Seguimiento();
        $data->id_tramite = $id;
        $data->tipo_tramite = 'Parametros Urbanisticos';
        $data->print = 0;
        $data->estado = 1;
        $data->fecha = date('d-m-Y');
        $data->hora = date('H:i:s');
        $data->user = $usuario;
        $data->observacion = 'Nuevo Tramite';
        $data->save();

        return redirect()->route('parametro.index');
    }

    public function pdf($id)
    {
        $showData = ParametrosUrb::findOrFail($id);
        return view('pdf/pdf_PU', compact('showData'));
    }

    public function show(ParametrosUrb $parametrosUrb)
    {
        
    }

    public function edit($id)
    {
        $data = ParametrosUrb::findOrFail($id);
        return view('modulo4/edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = ParametrosUrb::findOrFail($id);
        $data->titular = request('name');
        $data->numdoc = request('ruc');
        $data->expediente = request('expediente');
        $data->fecha_emision = request('fechaEmision');
        $data->direccion = request('direccion');
        $data->partida = request('numPartida');
        $data->num_informe = request('numInforme');
        $data->fecha_vencimiento = request('fechaVencimiento');
        $data->save();

        return redirect()->route('parametro.index');
    }

    public function destroy($id)
    {
        $data = ParametrosUrb::findOrFail($id);
        $data->delete();
        return redirect()->route('parametro.index');
    }
}
