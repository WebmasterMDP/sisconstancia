<?php

namespace App\Http\Controllers;

use App\Models\HabilitationAdmin;
use Illuminate\Http\Request;
use App\Models\ConstanciaPosesion;
use App\Models\Seguimiento;

class HabilitationAdminController extends Controller
{

    public function index()
    {
        $datos = ConstanciaPosesion::all();
        return view('Administracion/habilitacion', compact('datos'));
    }

    public function lokckPrint($id)
    {
        $datosConstancia = ConstanciaPosesion::findOrFail($id);

        ConstanciaPosesion::where(['id' => $id])
                ->update(['print' => '1']);
        $usuario = auth()->user()->username;

        Seguimiento::create([
            'id_tramite' => $datosConstancia['codConstancia'],	
            'estado' => '1',
            'print' => '1',
            'observacion' => $razon,
            'tipo_tramite' => 'Constancia de Posesion',
            'user' => $usuario,
            'fecha' => date('d-m-Y'),
            'hora' => date('H:i:s'),
        ]);
        return redirect()->route('administrador.index')->with('habAdmin', 'lockPirnt');
    }

    public function unlockPrint($id)
    {
        $datosConstancia = ConstanciaPosesion::findOrFail($id);
        $razon = request('razon');
        if($razon == null){

            /* var_dump('no funciona desanulacion'); */
            return redirect()->route('administrador.index')->with('habAdmin', 'miss');
        }else{
            ConstanciaPosesion::where(['id' => $id])
                        ->update(['print' => '0']);
            $usuario = auth()->user()->username;

            Seguimiento::create([
                'id_tramite' => $datosConstancia['codConstancia'],	
                'estado' => '1',
                'print' => '0',
                'observacion' => $razon,
                'tipo_tramite' => 'Constancia de Posesion',
                'user' => $usuario,
                'fecha' => date('d-m-Y'),
                'hora' => date('H:i:s'),
            ]);

            return redirect()->route('administrador.index')->with('habAdmin', 'unlockPrint');
    
        }
    }

    public function disable($id)
    {
        $datosConstancia = ConstanciaPosesion::findOrFail($id);
        $razon = request('razon');
        if($razon == null){
            return redirect()->route('habilitaciones')->with('habAdmin', 'miss');
        }else{
            ConstanciaPosesion::where(['id' => $id])
                    ->update(['estado' => '0']);
            $usuario = auth()->user()->username;

            Seguimiento::create([
                'id_tramite' => $datosConstancia['codConstancia'],	
                'estado' => '0',
                'print' => '0',
                'observacion' => $razon,
                'tipo_tramite' => 'Constancia de Posesion',
                'user' => $usuario,
                'fecha' => date('d-m-Y'),
                'hora' => date('H:i:s'),
            ]);
            
            return redirect()->route('administrador.index')->with('habAdmin', 'disable');
        }
    }

    public function enable($id)
    {
        $datosConstancia = ConstanciaPosesion::findOrFail($id);
        $razon = request('razon');
        if($razon == null){
            return redirect()->route('administrador.index')->with('habAdmin', 'miss');
        }else{
            ConstanciaPosesion::where(['id' => $id])
                    ->update(['estado' => '1']);
            $usuario = auth()->user()->username;

            Seguimiento::create([
                'id_tramite' => $datosConstancia['codConstancia'],	
                'estado' => '1',
                'print' => '1',
                'observacion' => $razon,
                'tipo_tramite' => 'Constancia de Posesion',
                'user' => $usuario,
                'fecha' => date('d-m-Y'),
                'hora' => date('H:i:s'),
            ]);

            return redirect()->route('administrador.index')->with('habAdmin', 'enable');

        }
    }

}
