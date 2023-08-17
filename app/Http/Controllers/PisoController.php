<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piso;

class PisoController extends Controller
{
    public function index()
    {
        $datos = Piso::all();
        return view('piso/list', compact('datos'));
    }

    public function create()
    {
        return view('modulo2/add');

    }

    public function store(Request $request)
    {
        $usuario = auth()->user()->username;
        
        return redirect()->route('habilitacion.index');
    }

    public function show(HabilitacionUrb $habilitacionUrb)
    {

    }

    public function edit($id)
    {
        $data = HabilitacionUrb::findOrFail($id);
        return view('modulo2/edit', compact('data'));
    }
}
