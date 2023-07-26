<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $dataUsers = User::all();
        return view('modulo1', compact('dataUsers'));
    }
    
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'numdoc' => 'required',
            'email' => 'required',
            'rol' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
            'numdoc.min' => 'Ingrese 8 carateres como mínimo',
            'numdoc.max' => 'Ingrese 8 carateres como maximo',
        ]);

        if($validate->fails()){

            return back()->withErrors($validate->errors())->withInput()->with('user', 'miss');
        
        }else{
            try{
                $user = new User();
                $user->name = $request->name;
                $user->numdoc = $request->numdoc;
                $user->username = $request->numdoc;
                $user->estado = '1';
                $user->password = Hash::make($request->numdoc);
                $user->email = $request->email;
                $user->rol = $request->rol;
                $user->save();

            return redirect()->back()->with('user', 'ok');

            }catch(\Exception $e){      

                return redirect()->back()->with('user', 'error');

            }
        }
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        var_dump($id);
        /* try{
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('user', 'ok');
        }catch(\Exception $e){
            return redirect()->back()->with('user', 'error');
        } */
    }
}
