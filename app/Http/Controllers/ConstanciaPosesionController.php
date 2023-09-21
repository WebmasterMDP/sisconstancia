<?php

namespace App\Http\Controllers;

use App\Models\ConstanciaPosesion;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConstanciaPosesionController extends Controller
{

    public function index()
    {
        $datos = ConstanciaPosesion::all();
        return view('modulo3/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo3/add');
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
            'areaTerrenoBruto' => 'required',
            'areaViaMetro' => 'required',
            'areaAfectaAporte' => 'required',
            'parqueZonal' => 'required',
            'serviciosPublico' => 'required',
            'areaServicio' => 'required',
            'areaVendible' => 'required',
            'areaCirculacion' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){

            return redirect()->route('constancia.create')->with('data', 'miss');

        }else{
        
            $usuario = auth()->user()->username;
            $data = new ConstanciaPosesion();
            $data->nombre_completo = request('name');
            $data->numdoc = request('numdoc');
            $data->num_informe = request('numInforme');
            $data->num_expediente = request('expediente');
            $data->fecha_expediente = request('fechaExpediente');
            $data->fecha_ingreso = request('fechaIngreso');
            $data->ubicacion = request('ubicacion');
            $data->partner = request('partner');
            $data->dni_partner = request('dniPartner');
            $data->area_predio = request('areaPredio');
            $data->plano_visado = request('planoVisado');
            $data->num_resolucion = request('numResolucion');
            $data->num_ordenanza = request('numOrdenanza');
            $data->fecha_validez = request('fechaValidez');

            $data->user = $usuario;
            $data->print = 0;
            $data->estado = 1;
            $data->save();
            $id = ConstanciaPosesion::latest('id')->value('id') ?? 1;

            $data = new Seguimiento();
            $data->id_tramite = $id;
            $data->tipo_tramite = 'Constancia de Posesion';
            $data->print = 0;
            $data->estado = 1;
            $data->fecha = date('d-m-Y');
            $data->hora = date('H:i:s');
            $data->user = $usuario;
            $data->observacion = 'Nuevo Tramite';
            $data->save();
            
            return redirect()->route('constancia.list')->with('create', 'ok');
        }
    }

    public function show(ConstanciaPosesion $constanciaPosesion)
    {

    }

    public function pdf($id)
    {
        $showData = ConstanciaPosesion::findOrFail($id);
        return view('pdf/pdf_CP', compact('showData'));
    }

    public function edit($id)
    {
        $data = ConstanciaPosesion::findOrFail($id);
        return view('modulo3/edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = ConstanciaPosesion::findOrFail($id);
        $data->nombre_completo = request('name');
        $data->numdoc = request('numdoc');
        $data->num_informe = request('numInforme');
        $data->num_expediente = request('expediente');
        $data->fecha_expediente = request('fechaExpediente');
        $data->ubicacion = request('ubicacion');
        $data->partner = request('partner');
        $data->dni_partner = request('dniPartner');
        $data->area_predio = request('areaPredio');
        $data->plano_visado = request('planoVisado');
        $data->num_resolucion = request('numResolucion');
        $data->num_ordenanza = request('numOrdenanza');
        $data->fecha_validez = request('fechaValidez');
        $data->save();

        return redirect()->route('constancia.index');
    }

    public function destroy($id)
    {
        $data = ConstanciaPosesion::findOrFail($id);
        $data->delete();
        return redirect()->route('constancia.index');
    }
}
