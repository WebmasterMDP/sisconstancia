<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function modulo1_add()
    {
        return view('modulo1/agregar');
    }

    public function modulo1_show()
    {
        return view('modulo1/lista');
    }

    public function modulo2_add()
    {
        return view('modulo2/agregar');
    }
    public function modulo2_show()
    {
        return view('modulo2/lista');
    }

    public function modulo3_add()
    {
        return view('modulo3/agregar');
    }

    public function modulo3_show()
    {
        return view('modulo3/lista');
    }

    public function modulo4_add()
    {
        return view('modulo4/agregar');
    }

    public function modulo4_show()
    {
        return view('modulo4/lista');
    }

    public function modulo5_add()
    {
        return view('modulo5/agregar');
    }

    public function modulo5_show()
    {
        return view('modulo5/lista');
    }


    public function profile(){       

        var_dump("ok");
        return view('profile.index', array('user' => Auth::user()) );
 
      
    }
}
