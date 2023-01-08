<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Consult;
use App\Models\Modality;
use App\Models\Whatsapp;
use App\Notifications\Consultas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbogadoEmergenciaController extends Controller
{
    public function tipoPago()
    {
        $modalidad = Modality::where("type",2)->first();
        $consulta = rand(10000,99999);
 
        $client = Client::where("user_id",auth()->user()->id)->first();

        Consult::create([
            'user_id'=> auth()->user()->id,
            'client_id'=> $client->id,
            'modalidad'=> $modalidad->name,
            'precio'=>$modalidad->price,
            'numeroConsulta'=> $consulta,
            'origen'=> "emergencia",
            'estado'=> "Ingresado",
            'created_at'=> Carbon::now()
        ]);

        return view("abogado-emergencia.tipoPago",compact(["modalidad","consulta"]));
    }

    public function showCuentasDeposito($consulta)
    {
        return view("abogado-emergencia.CuentasDeposito",['consulta'=>$consulta]);
    }
    
    public function showPagoTarjeta($consulta)
    {
        $Consulta = Consult::where('numeroConsulta',$consulta)->first();

        return view("abogado-emergencia.DatosTarjeta",["consult"=> $Consulta]);
    }
    
    public function storeTipoPago(Request $request)
    {
        $consulta = Consult::where('numeroConsulta',$request->numeroConsulta)->update([
               'tipo_pago'=> $request->modoPago 
        ]);
        return response()->json($request->numeroConsulta);
    }

    public function showEnvioVoucher($consulta)
    {
        $consult = Consult::where("numeroConsulta",$consulta)->first();

        return view("abogado-emergencia.EnvioVoucher",['consult'=>$consult]);
    }

    public function showConfirmarPago($consulta)
    {
        $consult = Consult::where("numeroConsulta",$consulta)->first();
        return view("abogado-emergencia.ConfirmarPago",['consulta'=>$consult]);
    }

    public function showPagoPendiente($consulta)
    {   
        $link = Whatsapp::all();
        $consulta = Consult::where("numeroConsulta",$consulta)->first();

        return view("abogado-emergencia.PorConfirmar",['consulta'=>$consulta,'link'=>$link]);
    }

    public function showErrorPago($consulta)
    {
        $consulta = Consult::where("numeroConsulta",$consulta)->first();
        return view("abogado-emergencia.ErrorPago",['consulta'=>$consulta]);
    }

    public function enviarVoucher(Request $request)
    {
        $request->validate([
            'voucher'=>'required|image',

        ],[
            'voucher.required'=>"Suba la foto de su pago por favor.",
            'voucher.image'=>"Suba una imagen válida"
        ]);

        if($request->hasFile("voucher"))
        {
            $nombre =Str::uuid().".".$request->voucher->getClientOriginalExtension() ;
            Storage::disk('public')->put("voucher/".$nombre ,  file_get_contents($request->file('voucher')));

            $codigo = Consult::where('numeroConsulta',$request->codigo_consulta)->update([
                'voucher'=> $nombre
            ]);
        }

        return redirect()->route("pago.confirmar",['consulta'=>$request->codigo_consulta]);
    }

    public function ConsultaEmergencia()
    {
        return view("abogado-emergencia.ConsultaAbogado");
    }


    public function index(Request $request)
    {
        $servicios = Modality::where("name","LIKE","%".$request->buscador."%")->where("type",4)->paginate(4);

        return response()->json($servicios);
    }

    public function store(Request $request)
    {
        if ($request->hasFile("img")) {
            $nombre = Str::uuid() . "." . $request->img->getClientOriginalExtension();
            Storage::disk('public')->put("servicio/abogado/" . $nombre,  file_get_contents($request->file('img')));
        }

        $servicio = new Modality();
        $servicio->name = $request->nombre;
        $servicio->price = $request->precio;
        $servicio->image = $request->hasFile("img") ? $nombre : "";
        $servicio->type = 4;
        $servicio->save();
    }

}
