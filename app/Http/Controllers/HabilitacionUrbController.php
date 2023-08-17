<?php

namespace App\Http\Controllers;

use App\Models\HabilitacionUrb;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabilitacionUrbController extends Controller
{
    public function index()
    {
        $datos = HabilitacionUrb::all();
        return view('modulo2/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo2/add');

    }


    public function store(Request $request)
    {
        $usuario = auth()->user()->username;
        
        $data = new HabilitacionUrb();
        $data->denominacion = request('denominacion');
        $data->expediente = request('expediente');
        $data->fecha_emision = request('fechaEmision');
        $data->zonificacion = request('zonificacion');
        $data->plano_aprobado = request('planoAprobado');
        $data->num_resolucion = request('numResolucion');
        $data->fecha_vencimiento = request('fechaVencimiento');
        $data->propietario = request('propietario');
        $data->responsable_obra = request('responsableObra');
        $data->departamento = request('departamento');
        $data->provincia = request('provincia');
        $data->distrito = request('distrito');
        $data->urbanizacion_otro = request('ubanizacionOtro');
        $data->uc = request('uc');
        $data->lote = request('lote');
        $data->area_bruta_terreno = request('areaTerrenoBruto');
        $data->area_via_metropolitana = request('areaViaMetro');
        $data->area_afecta_aportes = request('areaAfectaAporte');
        $data->parque_zonales = request('parqueZonal');
        $data->servicios_publicos = request('serviciosPublico');
        $data->area_servicios = request('areaServicio');
        $data->area_vendible = request('areaVendible');
        $data->area_circulacion = request('areaCirculacion');
        $data->user = $usuario;
        $data->print = 0;
        $data->estado = 1;
        $data->save();

        $id = HabilitacionUrb::latest('id')->value('id') ?? 1;

        $data = new Seguimiento();
        $data->id_tramite = $id;
        $data->tipo_tramite = 'Habilitacion Urbana';
        $data->print = 0;
        $data->estado = 1;
        $data->fecha = date('d-m-Y');
        $data->hora = date('H:i:s');
        $data->user = $usuario;
        $data->observacion = 'Nuevo Tramite';
        $data->save();

        return redirect()->route('habilitacion.index');
    }

    public function pdf($id)
    {
        $showData = HabilitacionUrb::findOrFail($id);

        return view('pdf/pdf_HU', compact('showData'));
    }

    public function show(HabilitacionUrb $habilitacionUrb)
    {

    }

    public function edit($id)
    {
        $data = HabilitacionUrb::findOrFail($id);
        return view('modulo2/edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = HabilitacionUrb::findOrFail($id);
        $data->denominacion = request('denominacion');
        $data->expediente = request('expediente');
        $data->fecha_emision = request('fechaEmision');
        $data->zonificacion = request('zonificacion');
        $data->plano_aprobado = request('planoAprobado');
        $data->num_resolucion = request('numResolucion');
        $data->fecha_vencimiento = request('fechaVencimiento');
        $data->propietario = request('propietario');
        $data->responsable_obra = request('responsableObra');
        $data->departamento = request('departamento');
        $data->provincia = request('provincia');
        $data->distrito = request('distrito');
        $data->urbanizacion_otro = request('ubanizacionOtro');
        $data->uc = request('uc');
        $data->lote = request('lote');
        $data->area_bruta_terreno = request('areaTerrenoBruto');
        $data->area_via_metropolitana = request('areaViaMetro');
        $data->area_afecta_aportes = request('areaAfectaAporte');
        $data->parque_zonales = request('parqueZonal');
        $data->servicios_publicos = request('serviciosPublico');
        $data->area_servicios = request('areaServicio');
        $data->area_vendible = request('areaVendible');
        $data->area_circulacion = request('areaCirculacion');
        $data->save();

        $usuario = auth()->user()->username;

        $data = new Seguimiento();
        $data->id_tramite = $id;
        $data->tipo_tramite = 'Habilitacion Urbana';
        $data->print = 0;
        $data->estado = 1;
        $data->fecha = date('d-m-Y');
        $data->hora = date('H:i:s');
        $data->user = $usuario;
        $data->observacion = 'Tramite Editado';
        $data->save();

        return redirect()->route('habilitacion.index');
    }

    public function destroy($id)
    {
        $data = HabilitacionUrb::findOrFail($id);
        $data->delete();
        return redirect()->route('habilitacion.index');
    }
    
}
