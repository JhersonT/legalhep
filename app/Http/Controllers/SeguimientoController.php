<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use App\Models\Observation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    
    public function index()
    {
        return view('seguimiento.seguimiento');
    }

    public function detalleConsulta($consulta)
    {
        $consulta = Consult::where("numeroConsulta",$consulta)->with(["client","abogado"])->first();
        $obs = Observation::where("consult_id",$consulta->id)->paginate(1);
        $date = new Carbon();
        return view("seguimiento.resumen",compact("consulta","date","obs"));
    }
}
