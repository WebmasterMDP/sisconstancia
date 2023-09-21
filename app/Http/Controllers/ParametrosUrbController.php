<?php

namespace App\Http\Controllers;

use App\Models\ParametrosUrb;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validate = Validator::make($request->all(),
        [
            'name' => 'required',
            'ruc' => 'required',
            'expediente' => 'required',
            'fechaEmision' => 'required',
            'direccion' => 'required',
            'numPartida' => 'required',
            'numInforme' => 'required',
            'fechaVencimiento' => 'required',
            'areaTerritorial' => 'required',
            'areaTratamientoNormativo' => 'required',
            'zonificacion' => 'required',
            'frenteLoteMininmo' => 'required',
            'estacionamiento' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){

            return redirect()->route('parametro.create')->with('data', 'miss');

        }else{

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
            $data->area_territorial = request('areaTerritorial');
            $data->area_tratamiento = request('areaTratamientoNormativo');
            $data->zonificacion = request('zonificacion');
            $data->frente_lote = request('frenteLoteMininmo');
            $data->estacionamiento = request('estacionamiento');

            $vivienda = '';
            $residencial = '';
            $condominio = '';

        for ($i = 1; $i <= 4; $i++) {
            $vivienda .= request('viviendaUnfComercio' . $i);
            $residencial .= request('conjuntoResidencial' . $i);
            $condominio .= request('conjuntoCondominios' . $i);
            
            if ($i < 4) {
                $vivienda .= ':';
                $residencial .= ':';
                $condominio .= ':';
            }
        }

        $data->vivienda = $vivienda;
        $data->residencial = $residencial;
        $data->condominio = $condominio;
        $data->frente_avenida = request('frenteAvenidas');
        $data->frente_calle = request('frenteCalles');
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
    }

    public function pdf($id)
    {
        $showData = ParametrosUrb::findOrFail($id);
        $infTecnica = ParametrosUrb::select('vivienda', 'residencial', 'condominio')
            ->where(['fecha_vencimiento' => $showData->fecha_vencimiento])
            ->get();

        return view('pdf/pdf_PU', compact('showData', 'infTecnica'));
    }

    public function show(ParametrosUrb $parametrosUrb)
    {
    }

    public function edit($id)
    {
        $data = ParametrosUrb::findOrFail($id);

        $row = ParametrosUrb::select('vivienda', 'residencial', 'condominio')
                            ->where('id', $id)->get();

        $valoresRows = [];

        foreach ($row as $rowData) {
            $valoresVivienda = explode(':', $rowData->vivienda);
            $valoresResidencial = explode(':', $rowData->residencial);
            $valoresCondominio = explode(':', $rowData->condominio);
            
            $valoresRows[] = [
                'vivienda' => $valoresVivienda,
                'residencial' => $valoresResidencial,
                'condominio' => $valoresCondominio,
            ];
        }

        /* var_dump($valoresRows[0]['antiguedad'][4]); */
        return view('modulo4/edit', compact('data', 'valoresRows'));
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
    
    public function getSunatDatos($ruc){

        $url = 'https://api.apis.net.pe/v1/dni?';

        $response = file_get_contents($url.'numero='.$ruc.out('json'));
        var_dump($response);
        /* $data = json_decode($response, true);
        return response()->json($data); */

        /* $data = json_decode($res->getBody(), true);
        return response()->json($data); */
    }
}
