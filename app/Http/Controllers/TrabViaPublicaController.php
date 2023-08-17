<?php

namespace App\Http\Controllers;

use App\Models\TrabViaPublica;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class TrabViaPublicaController extends Controller
{

    public function index()
    {
        $datos = TrabViaPublica::all();
        return view('modulo5/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo5/add');
    }

    public function store(Request $request)
    {
        $usuario = auth()->user()->username;
        
        $data = new TrabViaPublica();
        $data->nombre_completo = request('name');
        $data->numdoc = request('numDoc');
        $data->num_expediente = request('expediente');
        $data->fecha_expediente = request('fechaExpediente');
        $data->num_informe = request('numInforme');
        $data->comprobante = request('comprobante');

        $data->concepto_servicio = request('conceptoServicio');
        $data->ubicacion = request('ubicacion');
        $data->fecha_instalacion = request('fechaInstalacion');
        $data->proveedor_servicio = request('proveedorServicio');

        $data->user = $usuario;
        $data->print = 0;
        $data->estado = 1;
        $data->save();

        $id = TrabViaPublica::latest('id')->value('id') ?? 1;

        $data = new Seguimiento();
        $data->id_tramite = $id;
        $data->tipo_tramite = 'Trabajo en Via Publica';
        $data->print = 0;
        $data->estado = 1;
        $data->fecha = date('d-m-Y');
        $data->hora = date('H:i:s');
        $data->user = $usuario;
        $data->observacion = 'Nuevo Tramite';
        $data->save();

        return redirect()->route('via.pub.index');
    }

    public function pdf($id)
    {
        $showData = TrabViaPublica::findOrFail($id);
        return view('pdf/pdf_TVP', compact('showData'));
    }

    public function show(TrabViaPublica $trabViaPublica)
    {
        
    }

    public function edit($id)
    {
        $data = TrabViaPublica::findOrFail($id);
        return view('modulo5/edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = TrabViaPublica::findOrFail($id);
        $data->nombre_completo = request('name');
        $data->numdoc = request('numDoc');
        $data->num_expediente = request('expediente');
        $data->fecha_expediente = request('fechaExpediente');
        $data->num_informe = request('numInforme');
        $data->comprobante = request('comprobante');

        $data->concepto_servicio = request('conceptoServicio');
        $data->ubicacion = request('ubicacion');
        $data->fecha_instalacion = request('fechaInstalacion');
        $data->proveedor_servicio = request('proveedorServicio');

        $data->save();

        return redirect()->route('via.pub.index');        
    }

    public function destroy($id)
    {
        $data = TrabViaPublica::findOrFail($id);
        $data->delete();
        return redirect()->route('via.pub.index');
    }
}
