<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    
    public function index(Request $request)
    {
        $filtro = $request->buscador;
        $consultas = Consult::where("modalidad","LIKE","%".$filtro."%")
                            ->orWhere("numeroConsulta","LIKE","%".$filtro."%")
                            ->orWhere("tipo_pago","LIKE","%".$filtro."%")
                            ->with(["client","observation"])
                            ->orderBy("id","desc")
                            ->paginate(4);

        return response()->json($consultas);
    }

    public function getConsultasUsers(Request $request,$user)
    {
   
        $filtro = $request->buscador;

        $user = User::where('id',$user)->with("abogado")->first();;

        $rol = $user->getRoleNames()["0"];

        if ($rol == "Admin") {

            $consultas = Consult::where("modalidad","LIKE","%".$filtro."%")
                            ->orWhere("numeroConsulta","LIKE","%".$filtro."%")
                            ->orWhere("tipo_pago","LIKE","%".$filtro."%")
                            ->with(["client","observation"])
                            ->orderBy("id","desc")
                            ->paginate(4);
        } 
        if($rol == "Abogado") {

            $consultas = Consult::where("abogado_id",$user->abogado->id)
                            ->where("modalidad","LIKE","%".$filtro."%")
                            ->where("numeroConsulta","LIKE","%".$filtro."%")
                            ->where("tipo_pago","LIKE","%".$filtro."%")
                            ->with(["client","observation"])
                            ->orderBy("id","desc")
                            ->paginate(4);
        }

        return response()->json($consultas);
    }
 
}
