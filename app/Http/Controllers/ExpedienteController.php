<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Consult;
use App\Models\Event;
use App\Models\Modality;
use App\Models\Services;
use App\Models\Observation;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ExpedienteController extends Controller
{
    public function create(Request $request)
    {
        $cliente = Client::where("n_doc",$request->n_documento)->first();
        $servicio = Subcategory::where("id",$request->accion)->first();
        $consulta = rand(10000,99999);

        if($cliente)
        {
            $cons = new Consult();
            $cons->user_id= $cliente->user_id;
            $cons->client_id = $cliente->id;
            $cons->modalidad = "Expediente";
            $cons->numeroConsulta = $consulta;
            $cons->tipo_pago = "Efectivo";
            $cons->pagado = true;
            $cons->servicio = $request->accion === "0"? $request->nombre_servicio : $servicio->name;
            $cons->precio = $request->accion === "0"? $request->precio : $servicio->precio;
            $cons->abogado_id = $request->abogado;
            $cons->origen = "Admin";
            $cons->especialidad = $request->especialidad;
            $cons->estado="Ingresado";
            $cons->save();
        }else{

            $user = new User();
            $user->name = $request->nombre." ". $request->apellido;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            $user->save();

            $client = new Client();
            $client->user_id = $user->id;
            $client->n_doc = $request->n_documento;
            $client->tipo_doc = $request->tipo_documento;
            $client->departamento = $request->departamento;
            $client->nombres = $request->nombre;
            $client->apellidos = $request->apellido;
            $client->pass = $request->password;
            $client->celular = $request->celular;
            $client->save();

            $cons = new Consult();
            $cons->user_id= $user->id;
            $cons->client_id = $client->id;
            $cons->modalidad = "Expediente";
            $cons->numeroConsulta = $consulta;
            $cons->tipo_pago = "Efectivo";
            $cons->pagado = true;
            $cons->servicio = $request->accion === "0"? $request->nombre_servicio : $servicio->name;
            $cons->precio = $request->accion === "0"? $request->precio : $servicio->precio;
            $cons->abogado_id = $request->abogado;
            $cons->origen = "Admin";
            $cons->especialidad = $request->especialidad;
            $cons->estado="Pagado";
            $cons->save();
        }

            $obs = new Observation();
            $obs->consult_id = $cons->id;
            $obs->observacion = $request->observaciones? $request->observaciones :"Sin Observaciones";
            $obs->estado = $request->estado === 'Otro'? $request->new_estado : $request->estado;
            $obs->save();
        
    }

    public function update(Request $request,$expediente)
    {
    
        $ex = Consult::where("id",$expediente)->with("client")->first();

        if ($request->hasFile("pdf")) {
            if ($ex->documento == null) {
                $nombre = Str::uuid() . "." . $request->pdf->getClientOriginalExtension();
                Storage::disk('public')->put("/expediente/documento/" . $nombre,  file_get_contents($request->file('pdf')));
            } else if ($ex->documento !== null) {
                if (Storage::disk('public')->exists("expediente/documento/" . $ex->documento)) {
                    $path = public_path("\storage\\expediente\\documento\\" . $ex->documento);
                    unlink($path);
                    $nombre = Str::uuid() . "." . $request->pdf->getClientOriginalExtension();
                    Storage::disk('public')->put("/expediente/documento/" . $nombre,  file_get_contents($request->file('pdf')));
                } else {
                    $nombre = Str::uuid() . "." . $request->pdf->getClientOriginalExtension();
                    Storage::disk('public')->put("/expediente/documento/" . $nombre,  file_get_contents($request->file('pdf')));
                }
            }
        }

        $exEstado = $ex->estado;

        $ex->estado= $request->estado;
        $ex->servicio = $request->servicio;
        $ex->especialidad = $request->especialidad;
        $ex->precio = $request->precio;
        $ex->abogado_id = $request->abogado;
        $ex->documento = $request->hasFile("pdf") ? $nombre : $ex->documento;
        $ex->fecha = $request->fecha;
        $ex->save();

        if($exEstado!== $request->estado || $request->observacion !== null)
        {
            $obs = new Observation();
            $obs->consult_id = $ex->id;
            $obs->observacion = $request->observacion !== null? $request->observacion :"Sin Observaciones";
            $obs->estado = $ex->estado !== $request->estado ? $request->estado : $ex->estado;
            $obs->save();
        }

        $con = Event::where("consult_id",$expediente)->first();

        if($con)
        {
            $con->fecha = $request->fecha;
            $con->save();
            
        }else{
            $event  = new Event();
            $event->abogado_id = $request->abogado;
            $event->titulo = "Consulta con ". $ex->client[0]->nombres;
            $event->fecha = $request->fecha;
            $event->consult_id = $expediente;
            $event->creador =  auth()->user()->id;
            $event->save();
        }

       
        
    }
}
