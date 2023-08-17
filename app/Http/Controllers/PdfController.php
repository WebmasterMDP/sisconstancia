<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\ConformidadObra;
use App\Models\HabilitacionUrb;
use App\Models\ConstanciaPosesion;
use App\Models\ParametrosUrb;
use App\Models\TrabajoViaPublica;

class PdfController extends Controller
{
    public function index()
    {     

    }
    public function conf_obras()
    {     

        
        return view('pdf/pdf_CO'/* , compact('showDatosLicencia') */);
    }

    public function hab_urbana($id)
    {
        $showData = HabilitacionUrb::select('*')
                    ->where(['id' => $id])
                    ->first();
        return view('pdf/pdf_HU', compact('showData'));
        
    }

    public function cons_posesion()
    {
        return view('pdf/pdf_CP');
    }

    public function par_urbano()
    {
        return view('pdf/pdf_PU');
    }

    public function trab_via_publica()
    {
        return view('pdf/pdf_TVP');
    }
}
