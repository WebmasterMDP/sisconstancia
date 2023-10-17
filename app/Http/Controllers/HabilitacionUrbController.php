<?php

namespace App\Http\Controllers;

use App\Models\HabilitacionUrb;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(),
        [
            'denominacion' => 'required',
            'expediente' => 'required',
            'fechaEmision' => 'required',
            'zonificacion' => 'required',
            'planoAprobado' => 'required',
            'numResolucion' => 'required',
            'fechaVencimiento' => 'required',
            'propietario' => 'required',
            'responsableObra' => 'required',
            'departamento' => 'required',
            'provincia' => 'required',
            'distrito' => 'required',
            'ubanizacionOtro' => 'required',
            'uc' => 'required',
            'lote' => 'required',

            'areaTerrenoBruto1' => 'required',
            'areaUtil1' => 'required',
            'areaVias1' => 'required',
            'areaRecreacion1' => 'required',
            'areaMinisterio1' => 'required',
            'areaFines1' => 'required',
            'areaParques1' => 'required',
            'areaEquipamiento1' => 'required',
            'otros1' => 'required',

            'areaTerrenoBruto2' => 'required',
            'areaUtil2' => 'required',
            'areaVias2' => 'required',
            'areaRecreacion2' => 'required',
            'areaMinisterio2' => 'required',
            'areaFines2' => 'required',
            'areaParques2' => 'required',
            'areaEquipamiento2' => 'required',
            'otros2' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){
            
            return redirect()->route('habilitacion.create')->with('data', 'miss');

        }else{
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

            $areaTerrenoBruto = '';
            $areaUtil = '';
            $areaVias = '';
            $areaRecreacion = '';
            $areaMinisterio = '';
            $areaFines = '';
            $areaParques = '';
            $areaEquipamiento = '';
            $otros = '';

            for ($i = 1; $i <= 2; $i++) {
                $areaTerrenoBruto .= request('areaTerrenoBruto' . $i);
                $areaUtil .= request('areaUtil' . $i);
                $areaVias .= request('areaVias' . $i);
                $areaRecreacion .= request('areaRecreacion' . $i);
                $areaMinisterio .= request('areaMinisterio' . $i);
                $areaFines .= request('areaFines' . $i);
                $areaParques .= request('areaParques' . $i);
                $areaEquipamiento .= request('areaEquipamiento' . $i);
                $otros .= request('otros' . $i);
                
                if ($i < 2) {
                    $areaTerrenoBruto .= ';';
                    $areaUtil .= ';';
                    $areaVias .= ';';
                    $areaRecreacion .= ';';
                    $areaMinisterio .= ';';
                    $areaFines .= ';';
                    $areaParques .= ';';
                    $areaEquipamiento .= ';';
                    $otros .= ';';
                }
            }

            $data->area_bruta_terreno = $areaTerrenoBruto;
            $data->area_util_lotes = $areaUtil;
            $data->area_vias = $areaVias;
            $data->area_aportes_recreacion = $areaRecreacion;
            $data->area_aportes_ministerio = $areaMinisterio;
            $data->area_otros_fines = $areaFines;
            $data->area_parques_zonales = $areaParques;
            $data->area_equipamiento_urbano = $areaEquipamiento;
            $data->otros = $otros;

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

            return redirect()->route('habilitacion.index')->with('data', 'success');
        }
    }

    public function pdf($id)
    {
        $showData = HabilitacionUrb::findOrFail($id);

        $dataAreaPorc = HabilitacionUrb::select('area_bruta_terreno', 'area_util_lotes', 'area_vias', 'area_aportes_recreacion', 'area_aportes_ministerio', 'area_otros_fines', 'area_parques_zonales', 'area_equipamiento_urbano', 'otros')
            ->where(['id' => $id])
            ->get();
        return view('pdf/pdf_HU', compact('showData', 'dataAreaPorc'));
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