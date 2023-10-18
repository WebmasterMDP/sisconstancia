<?php

namespace App\Http\Controllers;

use App\Models\ConstanciaPosesion;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
            'nombreCompleto'=> 'required',
            'numdoc'=> 'required',
            'numInforme'=> 'required',
            'zona'=> 'required',
            'estadoCivil'=> 'required',
            'fechaInforme'=> 'required',
            'numExpediente'=> 'required',
            'fechaExpediente'=> 'required',
            'fechaIngreso'=> 'required',
            'lote'=> 'required',
            'manzana'=> 'required',
            'ubicacion'=> 'required',
            'partner'=> 'required',
            'dniPartner'=> 'required',
            'areaPredio'=> 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){

            return redirect()->route('constancia.create')->with('data', 'miss');

        }else{
        
            try {
                $datosConstancia = $request->except('btnRegistrar','_token');
                $consultaCodigoAnt = ConstanciaPosesion::select('id','codConstancia','periodo')                                            
                                                        ->orderBy('id', 'desc')
                                                        ->first();
                $token = Str::random(60);
                $generarCodigoLicencia = ($consultaCodigoAnt->id) + 1;

                if(empty($consultaCodigoAnt) || empty($consultaCodigoAnt->id) || empty($consultaCodigoAnt->periodo)) {
    
                    $codConstancia = array('codConstancia' => '0001-'.date('Y'),
                                    'periodo' => date('Y'),
                                    '_token' => $token,
                                    'user' => Auth::user()->username); 
                    $registroLicencia = array_merge($codConstancia, $datosConstancia);            
                    
                }else {
                    if ($consultaCodigoAnt->periodo != date('Y') ) {
                        $codConstancia = array('codConstancia' => '0001-'.date('Y') ,
                                    'periodo' =>  date('Y'),
                                    '_token' => $token.''.$generarCodigoLicencia,
                                    'user' => Auth::user()->username); 
                        $registroLicencia = array_merge($codConstancia, $datosConstancia);
                    
                    }else {
                        /* $codLicencia = array('codLicencia' => '000'.$consultaCodigoAnt->id+(1).'-'.$consultaCodigoAnt->periodo,
                                        'periodo' => date('Y'));*/
                        /* $generarCodigoLicencia = substr($consultaCodigoAnt->codLicencia, 2) + 1; */
                        // $generarCodigoLicencia = substr($consultaCodigoAnt->codLicencia, 0, 4) + 1;
                        $codConstancia = array('codConstancia' => '000'.$generarCodigoLicencia.'-'.$consultaCodigoAnt->periodo,
                                            'periodo' => date('Y'),
                                            '_token' => $token.''.$generarCodigoLicencia,
                                            'user' => Auth::user()->username);
    
                        $registroLicencia = array_merge($codConstancia, $datosConstancia);               
                    }           
                    
                }
                Seguimiento::create([
                    'id_tramite' => $generarCodigoLicencia,
                    'estado' => '1',
                    'print' => '0',
                    'observacion' => 'Nuevo Tramite',
                    'tipo_tramite' => 'Constancia de Posesion',
                    'user' => $registroLicencia['user'],
                    'fecha' => date('d-m-Y'),
                    'hora' => date('H:i:s'),
                ]);
                /* Licencia::insert($registroLicencia); */
                ConstanciaPosesion::create($registroLicencia);
                return redirect()->route('constancia.index')->with('create', 'ok'); 
                /* return back()->with('licencia', 'ok'); */
    
            } catch (\Throwable $th) {
                return redirect()->route('constancia.index')->with('error', $th->getMessage());
                /* return redirect('licencias/show')->with('licencia', 'error'); */
            }
        }
    }

    public function show(ConstanciaPosesion $constanciaPosesion)
    {

    }

    public function pdf($token)
    {
        
        $showData = ConstanciaPosesion::select('*')->where('_token',$token)->first();
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
