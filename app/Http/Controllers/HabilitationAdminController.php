<?php

namespace App\Http\Controllers;

use App\Models\HabilitationAdmin;
use Illuminate\Http\Request;

class HabilitationAdminController extends Controller
{

    public function index()
    {
        $datos = HabilitationAdmin::all();
        return view('Administrador/habilitacion', compact('datos'));
    }

    public function lokckPrint()
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

    public function unlockPrint(Request $request)
    {
        $razon = request('razon');
        if($razon == null){

            var_dump('no funciona desanulacion');
            /* return redirect()->route('habilitaciones')->with('reason', 'miss'); */
        }else{
            /* try{ */
                ConstanciaPosesion::where(['id' => $id])
                            ->update(['estado' => '0']);
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

                var_dump('funciona');

                /* return redirect()->route('habilitaciones')->with('print', 'ok'); */
    
            /* }catch (\Throwable $th) {
                return redirect()->route('habilitaciones')->with('error', 'fail');
            } */
        }
    }

    public function disable()
    {
        $razon = request('razon');
        if($razon == null){
            return redirect()->route('habilitaciones')->with('reason', 'miss');
        }else{
            try{
                Licencia::where(['id' => $id])
                        ->update(['estado' => '0']);
                $usuario = auth()->user()->username;

                $seguimiento = new Seguimiento();
                $seguimiento->licencia_id = $id;
                $seguimiento->estado = '0';
                $seguimiento->print = request('print');
                $seguimiento->observacion = request('razon');
                $seguimiento->usuario = $usuario;
                $seguimiento->save();
                
                return redirect()->route('habilitaciones')->with('anular', 'ok');

                } catch (\Throwable $th) {

                return redirect()->route('habilitaciones')->with('error', 'fail');
            }
        }
    }

    public function enable()
    {
        $razon = request('razon');
        if($razon == null){
            return redirect()->route('habilitaciones')->with('reason', 'miss');
        }else{
            try{ 
                Licencia::where(['id' => $id])
                        ->update(['estado' => '1']);
                $usuario = auth()->user()->username;

                $seguimiento = new Seguimiento();
                $seguimiento->licencia_id = $id;
                $seguimiento->estado = '1';
                $seguimiento->print = request('print');
                $seguimiento->observacion = request('razon');
                $seguimiento->usuario = $usuario;
                $seguimiento->save();

                return redirect()->route('habilitaciones')->with('desanular', 'ok');

            } catch (\Throwable $th) {
                return redirect()->route('habilitaciones')->with('error', 'fail');
            }
        }
    }

}
