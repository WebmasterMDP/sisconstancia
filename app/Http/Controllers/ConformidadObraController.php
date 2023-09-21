<?php

namespace App\Http\Controllers;

use App\Models\ConformidadObra;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use App\Models\Piso;
use Illuminate\Support\Facades\Validator;

class ConformidadObraController extends Controller
{
    
    public function index()
    {
        $datos = ConformidadObra::all();
        return view('modulo1/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo1/add');
    }

    public function store(Request $request)
    {

        $rules = [
            'cantidadPisos' => 'required|integer|min:1', 
            'edificacion' => 'required',
            'expediente' => 'required',
            'fechaExpediente' => 'required',
            'propietario' => 'required',
            'resolucion' => 'required',
            'numLicencia' => 'required',
            'ubicacion' => 'required',
            'areaConstruida' => 'required',
            'areaTerreno' => 'required',
            'valorObra' => 'required',
            'otro' => 'required',
            'zonificacionNormativa' => 'required',
            'areaEuNormativa' => 'required',
            'alturaNormativa' => 'required',
            'retiroNormativa' => 'required',
            'areaLibreNormativa' => 'required',
            'densidadNormativa' => 'required',
            'estacionamientoNormativa' => 'required',
            'zonificacionProyecto' => 'required',
            'areaEuProyecto' => 'required',
            'alturaProyecto' => 'required',
            'retiroProyecto' => 'required',
            'areaLibreProyecto' => 'required',
            'densidadProyecto' => 'required',
            'estacionamientoProyecto' => 'required',
            'observaciones' => 'required',
        ];
        
        /* for ($i = 0; $i < $request->input('cantidadPisos'); $i++) {
            $rules["antiguedadPiso".$i] = 'required';
            $rules["muroColumnaPiso".$i] = 'required';
            $rules["techosPiso".$i] = 'required';
            $rules["pisoPiso".$i] = 'required';
            $rules["puertasVentanasPiso".$i] = 'required';
            $rules["revestimientoPiso".$i] = 'required';
            $rules["banoPiso".$i] = 'required';
            $rules["instElectPiso".$i] = 'required';
            $rules["areaConstruidaPiso".$i] = 'required';
        } */
        
        $validator = Validator::make($request->all(), $rules, [
            'required' => 'Ingrese datos solicitados',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('conformidad.create')->with('data', 'miss');
        }
        

        /* if($validate->fails()){
            return redirect()->route('conformidad.create')->with('data', 'miss');
        } */else{

            $usuario = auth()->user()->username;

            $piso = new Piso();

            $antiguedad = '';
            $muroColumna = '';
            $techos = '';
            $pisos = '';
            $puertaVentana = '';
            $revestimiento = '';
            $bano = '';
            $instElect = '';
            $areaConstruida = '';

            for ($i = 1; $i <= request('cantidadPisos'); $i++) {
                $antiguedad .= request('antiguedadPiso' . $i);
                $muroColumna .= request('muroColumnaPiso' . $i);
                $techos .= request('techosPiso' . $i);
                $pisos .= request('pisoPiso' . $i);
                $puertaVentana .= request('puertasVentanasPiso' . $i);
                $revestimiento .= request('revestimientoPiso' . $i);
                $bano .= request('banoPiso' . $i);
                $instElect .= request('instElectPiso' . $i);
                $areaConstruida .= request('areaConstruidaPiso' . $i);
                
                if ($i < request('cantidadPisos')) {
                    $antiguedad .= '-';
                    $muroColumna .= '-';
                    $techos .= '-';
                    $pisos .= '-';
                    $puertaVentana .= '-';
                    $revestimiento .= '-';
                    $bano .= '-';
                    $instElect .= '-';
                    $areaConstruida .= '-';
                }
            }
            
            $piso->expediente_conformidad = request('expediente');
            $piso->antiguedad = $antiguedad;
            $piso->muro_columna = $muroColumna;
            $piso->techos = $techos;
            $piso->piso = $pisos;
            $piso->puerta_ventana = $puertaVentana;
            $piso->revestimiento = $revestimiento;
            $piso->bano = $bano;
            $piso->inst_elect = $instElect;
            $piso->area_construida = $areaConstruida;
            $piso->user = $usuario;
            $piso->estado = 1;
            $piso->observaciones = 'Nuevo Tramite';
            $piso->save();

            $conformidad = new ConformidadObra();
            $conformidad->tipo_edificacion = request('edificacion');
            $conformidad->expediente = request('expediente');
            $conformidad->fecha_expediente = request('fechaExpediente');
            $conformidad->propietario = request('propietario');
            $conformidad->num_resolucion = request('resolucion');
            $conformidad->num_licencia = request('numLicencia');
            $conformidad->ubicacion = request('ubicacion');
            $conformidad->area_construida = request('areaConstruida');
            $conformidad->area_terreno = request('areaTerreno');
            $conformidad->valor_obra = request('valorObra');
            $conformidad->otros = request('otro');
            $conformidad->cantidad_pisos = request('cantidadPisos');

            $conformidad->zonificacion_normativa = request('zonificacionNormativa');
            $conformidad->area_eu_normativa = request('areaEuNormativa');
            $conformidad->altura_edif_normativa = request('alturaNormativa');
            $conformidad->retiro_normativa = request('retiroNormativa');
            $conformidad->area_libre_normativa = request('areaLibreNormativa');
            $conformidad->densidad_normativa = request('densidadNormativa');
            $conformidad->estacionamiento_normativa = request('estacionamientoNormativa');

            $conformidad->zonificacion_proyecto = request('zonificacionProyecto');
            $conformidad->area_eu_proyecto = request('areaEuProyecto');
            $conformidad->altura_edif_proyecto = request('alturaProyecto');
            $conformidad->retiro_proyecto = request('retiroProyecto');
            $conformidad->area_libre_proyecto = request('areaLibreProyecto');
            $conformidad->densidad_proyecto = request('densidadProyecto');
            $conformidad->estacionamiento_proyecto = request('estacionamientoProyecto');

            $conformidad->observaciones = request('observaciones');
            
            $conformidad->user = $usuario;
            $conformidad->print = 0;
            $conformidad->estado = 1;
            $conformidad->save();

            $id = ConformidadObra::latest('id')->value('id') ?? 1;

            $data = new Seguimiento();
            $data->id_tramite = $id;
            $data->tipo_tramite = 'Conformidad de Obra';
            $data->print = 0;
            $data->estado = 1;
            $data->fecha = date('d-m-Y');
            $data->hora = date('H:i:s');
            $data->user = $usuario;
            $data->observacion = 'Nuevo Tramite';
            $data->save();

        return redirect()->route('conformidad.index')->with('data', 'success');

        }
    }

    public function pdf($id)
    {
        $showData = ConformidadObra::findOrFail($id);

        $pisosData = Piso::select('antiguedad', 'muro_columna', 'techos', 'piso', 'puerta_ventana', 'revestimiento', 'bano', 'inst_elect', 'area_construida')
            ->where(['expediente_conformidad' => $showData->expediente])
            ->get();

        return view('pdf/pdf_CO', compact('showData', 'pisosData'));
    }
    
    public function show(ConformidadObra $conformidadObra)
    {
    }

    public function edit($id)
    {
        $data = ConformidadObra::findOrFail($id);
        $pisosData = Piso::select('antiguedad', 'muro_columna', 'techos', 'piso', 'puerta_ventana', 'revestimiento', 'bano', 'inst_elect', 'area_construida')
                ->where(['expediente_conformidad' => $data->expediente])
                ->get();

        $valoresPisos = [];

        foreach ($pisosData as $piso) {
            $valoresAntiguedad = explode('-', $piso->antiguedad);
            $valoresMuroColumna = explode('-', $piso->muro_columna);
            $valoresTechos = explode('-', $piso->techos);
            $valoresPiso = explode('-', $piso->piso);
            $valoresPuertaVentana = explode('-', $piso->puerta_ventana);
            $valoresRevestimiento = explode('-', $piso->revestimiento);
            $valoresBano = explode('-', $piso->bano);
            $valoresInstElect = explode('-', $piso->inst_elect);
            $valoresAreaConstruida = explode('-', $piso->area_construida);
            
            $valoresPisos[] = [
                'antiguedad' => $valoresAntiguedad,
                'muro_columna' => $valoresMuroColumna,
                'techos' => $valoresTechos,
                'piso' => $valoresPiso,
                'puerta_ventana' => $valoresPuertaVentana,
                'revestimiento' => $valoresRevestimiento,
                'bano' => $valoresBano,
                'inst_elect' => $valoresInstElect,
                'area_construida' => $valoresAreaConstruida,
            ];
        }

        return view('modulo1/edit', compact('data','valoresPisos'));
    }

    public function update($id, Request $request)
    {
        $usuario = auth()->user()->username;
    
        $antiguedad = '';
        $muroColumna = '';
        $techos = '';
        $pisos = '';
        $puertaVentana = '';
        $revestimiento = '';
        $bano = '';
        $instElect = '';
        $areaConstruida = '';
        
        for ($i = 1; $i <= request('cantidadPisos'); $i++) {
            $antiguedad .= request('antiguedad' . $i);
            $muroColumna .= request('muro_columna' . $i);
            $techos .= request('techos' . $i);
            $pisos .= request('piso' . $i);
            $puertaVentana .= request('puerta_ventana' . $i);
            $revestimiento .= request('revestimiento' . $i);
            $bano .= request('bano' . $i);
            $instElect .= request('inst_elect' . $i);
            $areaConstruida .= request('area_construida' . $i);
            
            if ($i < request('cantidadPisos')) {
                $antiguedad .= '-';
                $muroColumna .= '-';
                $techos .= '-';
                $pisos .= '-';
                $puertaVentana .= '-';
                $revestimiento .= '-';
                $bano .= '-';
                $instElect .= '-';
                $areaConstruida .= '-';
            }
        }


        $piso = Piso::where(['expediente_conformidad' => request('expediente')])->first();
        $piso->expediente_conformidad = request('expediente');
        $piso->antiguedad = $antiguedad;
        $piso->muro_columna = $muroColumna;
        $piso->techos = $techos;
        $piso->piso = $pisos;
        $piso->puerta_ventana = $puertaVentana;
        $piso->revestimiento = $revestimiento;
        $piso->bano = $bano;
        $piso->inst_elect = $instElect;
        $piso->area_construida = $areaConstruida;
        $piso->user = $usuario;
        $piso->estado = 1;
        $piso->observaciones = 'Nuevo Tramite';
        $piso->save();

        $conformidad = ConformidadObra::findOrFail($id);
        $conformidad->tipo_edificacion = request('edificacion');
        $conformidad->expediente = request('expediente');
        $conformidad->fecha_expediente = request('fechaExpediente');
        $conformidad->propietario = request('propietario');
        $conformidad->num_resolucion = request('resolucion');
        $conformidad->num_licencia = request('numLicencia');
        $conformidad->ubicacion = request('ubicacion');
        $conformidad->area_construida = request('areaConstruida');
        $conformidad->area_terreno = request('areaTerreno');
        $conformidad->valor_obra = request('valorObra');
        $conformidad->otros = request('otro');
        $conformidad->cantidad_pisos = request('cantidadPisos');

        $conformidad->zonificacion_normativa = request('zonificacionNormativa');
        $conformidad->area_eu_normativa = request('areaEuNormativa');
        $conformidad->altura_edif_normativa = request('alturaNormativa');
        $conformidad->retiro_normativa = request('retiroNormativa');
        $conformidad->area_libre_normativa = request('areaLibreNormativa');
        $conformidad->densidad_normativa = request('densidadNormativa');
        $conformidad->estacionamiento_normativa = request('estacionamientoNormativa');

        $conformidad->zonificacion_proyecto = request('zonificacionProyecto');
        $conformidad->area_eu_proyecto = request('areaEuProyecto');
        $conformidad->altura_edif_proyecto = request('alturaProyecto');
        $conformidad->retiro_proyecto = request('retiroProyecto');
        $conformidad->area_libre_proyecto = request('areaLibreProyecto');
        $conformidad->densidad_proyecto = request('densidadProyecto');
        $conformidad->estacionamiento_proyecto = request('estacionamientoProyecto');

        $conformidad->observaciones = request('observaciones');
        
        $conformidad->user = $usuario;
        $conformidad->print = 0;
        $conformidad->estado = 1;
        $conformidad->save();

        $id = ConformidadObra::latest('id')->value('id') ?? 1;

        $data = new Seguimiento();
        $data->id_tramite = $id;
        $data->tipo_tramite = 'Conformidad de Obra';
        $data->print = 0;
        $data->estado = 1;
        $data->fecha = date('d-m-Y');
        $data->hora = date('H:i:s');
        $data->user = $usuario;
        $data->observacion = 'Tramite Actualizado';
        $data->save();

        return redirect()->route('conformidad.index');
    }

    public function destroy(ConformidadObra $conformidadObra)
    {
        //
    }

    public function actualizarPisos($id, $pisos)
    {
        $usuario = auth()->user()->username;
        $data = ConformidadObra::findOrFail($id);

        $antiguedad = '';
        $muroColumna = '';
        $techos = '';
        $pisos = '';
        $puertaVentana = '';
        $revestimiento = '';
        $bano = '';
        $instElect = '';
        $areaConstruida = '';
        
        for ($i = 1; $i <= $pisos; $i++) {
            $antiguedad .= $id.$i;
            $muroColumna .= $id.$i;
            $techos .= $id.$i;
            $pisos .= $id.$i;
            $puertaVentana .= $id.$i;
            $revestimiento .= $id.$i;
            $bano .= $id.$i;
            $instElect .= $id.$i;
            $areaConstruida .= $id.$i;
            
            if ($i < $pisos) {
                $antiguedad .= '-';
                $muroColumna .= '-';
                $techos .= '-';
                $pisos .= '-';
                $puertaVentana .= '-';
                $revestimiento .= '-';
                $bano .= '-';
                $instElect .= '-';
                $areaConstruida .= '-';
            }
        }

        return response()->json(['success' => true]);
    }
}
