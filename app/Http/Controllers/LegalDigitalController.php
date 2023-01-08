<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Consult;
use App\Models\Category;
use App\Models\Modality;
use App\Models\Services;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalDigitalController extends Controller
{
    public function categorias()
    {
        $categorias = Category::all();
        return view("legal-digital.categorias",compact("categorias"));
    }

    public function subCategoria($categoria)
    {
        $subcategoria = Subcategory::where("categorie_id",$categoria)->get();
        return view("legal-digital.subcategorias",compact("subcategoria"));
    }

    public function documento($sub)
    {
        $documento = Subcategory::find($sub);
        return view("legal-digital.documento",compact("documento"));
    }

    public function tipoPago($sub)
    {
        $modalidad = Subcategory::find($sub);
        $consulta = rand(10000,99999);
 
        $client = Client::where("user_id",auth()->user()->id)->first();

        Consult::create([
            'user_id'=> auth()->user()->id,
            'client_id'=> $client->id,
            'modalidad'=> $modalidad->name,
            'precio'=>$modalidad->precio,
            'numeroConsulta'=> $consulta,
            'origen'=> "legaldigital",
            'origen'=>"Ingresado",
            'created_at'=> Carbon::now()
        ]);

        

        return view("legal-digital.tipoPago",compact(["modalidad","consulta"]));

    }

    public function showPagoTarjeta($consulta)
    {
        $Consulta = Consult::where('numeroConsulta',$consulta)->first();

        return view("legal-digital.DatosTarjeta",["consult"=> $Consulta]);
    }

    public function storeTipoPago(Request $request)
    {
        $consulta = Consult::where('numeroConsulta',$request->numeroConsulta)->update([
            'tipo_pago'=> $request->modoPago 
     ]);
     return response()->json($request->numeroConsulta);
    }

    public function showCuentasDeposito($consulta)
    {
        return view("legal-digital.CuentasDeposito",['consulta'=>$consulta]);
    }

    public function showEnvioVoucher($consulta)
    {
        $consult = Consult::where("numeroConsulta",$consulta)->first();

        return view("legal-digital.EnvioVoucher",['consult'=>$consult]);
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

    public function consulta($id)
    {
        $subcategoria = Subcategory::where("id",$id)->first();

        return view("legal-digital.ConsultaAbogado",compact("subcategoria"));
    }
}
