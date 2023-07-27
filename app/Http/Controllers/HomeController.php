<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function modulo2()
    {
        return view('modulo2');
    }

    public function modulo3()
    {
        return view('modulo3');
    }

    public function modulo4()
    {
        return view('modulo4');
    }

    public function modulo5()
    {
        return view('modulo5');
    }

    public function changepass()
    {
        return view('changepassword');
    }
}
