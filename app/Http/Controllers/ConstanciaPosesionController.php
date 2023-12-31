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
            'siglasArquitecto' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){

            return redirect()->route('constancia.create')->with('constancia', 'miss');

        }else{
        
            /* try { */
                $datosConstancia = $request->except('btnRegistrar','_token');
                $consultaCodigoAnt = ConstanciaPosesion::select('id','codConstancia','periodo')                                            
                                                        ->orderBy('id', 'desc')
                                                        ->first();
                $token = Str::random(60);

                if(empty($consultaCodigoAnt) || empty($consultaCodigoAnt->id) || empty($consultaCodigoAnt->periodo)) {
    
                    $codConstancia = array('codConstancia' => '0001-'.date('Y'),
                                    'periodo' => date('Y'),
                                    '_token' => $token.'1',
                                    'user' => Auth::user()->username); 
                    $registroLicencia = array_merge($codConstancia, $datosConstancia);            
                    
                }else {
                    $generarCodigoLicencia = $consultaCodigoAnt->id + 1;

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
                    'id_tramite' => $registroLicencia['codConstancia'],	
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
                return redirect()->route('constancia.index')->with('constancia', 'create'); 
                /* return back()->with('licencia', 'ok'); */
    
            /* } catch (\Throwable $th) {
                return redirect()->route('constancia.index')->with('error', $th->getMessage()); */
                /* return redirect('licencias/show')->with('licencia', 'error'); */
            /* } */
        }
    }

    public function pdf($id)
    {
        $showData = ConstanciaPosesion::select('*')->where('id',$id)->first();
        return view('pdf/pdf_CP', compact('showData'));
    }

    public function edit($id)
    {
        $data = ConstanciaPosesion::findOrFail($id);
        return view('modulo3/edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $usuario = auth()->user()->username;
        $data = ConstanciaPosesion::findOrFail($id);
        $data->nombreCompleto = request('nombreCompleto');
        $data->numdoc = request('numdoc');
        $data->numInforme = request('numInforme');
        $data->numExpediente = request('numExpediente');
        $data->fechaInforme = request('fechaInforme');
        $data->fechaExpediente = request('fechaExpediente');
        $data->estadoCivil = request('estadoCivil');
        $data->zona = request('zona');
        $data->lote = request('lote');
        $data->manzana = request('manzana');
        $data->ubicacion = request('ubicacion');
        $data->partner = request('partner');
        $data->dniPartner = request('dniPartner');
        $data->areaPredio = request('areaPredio');
        $data->save();

        Seguimiento::create([
            'id_tramite' => $data->codConstancia,	
            'estado' => $data->estado,
            'print' => $data->print,
            'observacion' => 'Actualizacion de Tramite',
            'tipo_tramite' => 'Constancia de Posesion',
            'user' => $usuario,
            'fecha' => date('d-m-Y'),
            'hora' => date('H:i:s'),
        ]);

        return redirect()->route('constancia.index')->with('constancia', 'update');
    }

    public function anulacionPrint($id)
    {
        /* $razon = request('razon'); */
        $data = ConstanciaPosesion::findOrFail($id);

        /* return redirect()->route('habilitaciones')->with('reason', 'miss'); */
            /* var_dump('no funciona anulacion'); */

            ConstanciaPosesion::where(['id' => $id])
                    ->update(['estado' => '0', 'print' => '1']);
            $usuario = auth()->user()->username;

            Seguimiento::create([
                'id_tramite' => $datosConstancia['codConstancia'],	
                'estado' => '0',
                'print' => '1',
                'observacion' => $razon,
                'tipo_tramite' => 'Constancia de Posesion',
                'user' => $usuario,
                'fecha' => date('d-m-Y'),
                'hora' => date('H:i:s'),
            ]);
            
            var_dump('funciona anulacion');
    }

    public function disable($id)
    {
        $datosConstancia = ConstanciaPosesion::findOrFail($id);
        ConstanciaPosesion::where(['id' => $id])
                    ->update(['estado' => '0']);
            $usuario = auth()->user()->username;

            Seguimiento::create([
                'id_tramite' => $datosConstancia['codConstancia'],	
                'estado' => '0',
                'print' => '1',
                'observacion' => 'ANULADO',
                'tipo_tramite' => 'Constancia de Posesion',
                'user' => $usuario,
                'fecha' => date('d-m-Y'),
                'hora' => date('H:i:s'),
            ]);
            
        return redirect()->route('constancia.index')->with('habAdmin', 'disable');
    }


    public function destroy($id)
    {
        $data = ConstanciaPosesion::findOrFail($id);
        $data->delete();
        return redirect()->route('constancia.index')->with('constancia', 'disabled');
    }

    /* public function transformarCadena($cadena) {

        $palabras = Str::words($cadena, 1, '');

        // Convierte las palabras en un arreglo de caracteres
        $primerasLetras = str_split($palabras);

        // Convierte el arreglo de caracteres en una cadena
        $resultado = implode('', $primerasLetras);

        return $resultado;

        $cadenaOriginal = "Hola Mundo";
        $cadenaTransformada = $this->transformarCadena($cadenaOriginal);

    } */
}
