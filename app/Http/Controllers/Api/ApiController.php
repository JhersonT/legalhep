<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Abogado;
use App\Models\Consult;
use App\Models\Event;
use App\Models\Modality;
use App\Models\Observation;
use App\Models\State;
use App\Models\Whatsapp;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    //

    public function getDepartamentos()
    {
        $departamentos = Department::all();

        return response()->json($departamentos);
    }

    public function getDatosUsuario(Request $request)
    {
        $usuario = User::where('id', $request->id)->with("client")->first();

        return response()->json($usuario);
    }

    public function getImage(Request $request)
    {
        $cliente = Client::where("user_id", $request->id)->first();
        if ($cliente->img_perfil) {
            $path = $cliente->img_perfil;
            return response()->json($path);
        } else {
            return response()->json(false);
        }
    }

    public function Modalidades()
    {
        $modalidades = Modality::where("type", "1")->paginate(3);
        return response()->json($modalidades);
    }

    public function getModalidad($id)
    {
        $modalidad = Modality::where('id', $id)->first();

        return response()->json($modalidad);
    }

    public function getConsulta(Request $request)
    {
        $consulta = Consult::where('numeroConsulta', $request->codigo)->first();

        return response()->json($consulta);
    }

    public function StorePago(Request $request)
    {
        $consulta = Consult::where("numeroConsulta", $request->consulta)->first();

        if ($request->status === "approved") {
            $consulta->pagado = true;
            $consulta->id_transaccion = $request->transaccion;
            $consulta->estado = "Pagado";
            $consulta->save();
        } else if ($request->status === "rejected") {
            $consulta->pagado = false;
            $consulta->id_transaccion = "rechazado";
            $consulta->save();
        }
    }

    public function ModalidadesEmergencia()
    {
        $modalidades = Modality::where("type", "4")->paginate(3);
        return response()->json($modalidades);
    }

    public function ModalidadesDigital()
    {
        $modalidades = Modality::where("type", "5")->get();
        return response()->json($modalidades);
    }

    public function searchDocumento($documento)
    {
        $client = Client::where("n_doc", $documento)->with("user")->first();

        if ($client)
            return response()->json($client);
        else
            return response()->json(false);
    }

    public function getModadlidades()
    {
        $moda = Modality::where("type", 1)->get();

        return response()->json($moda);
    }

    public function searchEmail($email)
    {
        $email = User::where("email", $email)->select("email")->first();

        if ($email)
            return response()->json($email);
        else
            return response()->json(false);
    }

    public function getAbogados()
    {
        $abogados = Abogado::where("estado",1)->get();

        return response()->json($abogados);
    }

    public function getEstados($user)
    {
        $user = User::where('id',$user)->with("abogado")->first();;

        $rol = $user->getRoleNames()["0"];

        if ($rol == "Admin") {
            $estados = State::all();
        } else {
            $estados = State::where("id","!=", 8)->get();
        }
        
        return response()->json($estados);
    }

    public function AllEstados()
    {
        $estados = State::all();

        return response()->json($estados);
    }

    public function getDatosConsulta($id)
    {

        $consulta = Consult::where("id", $id)->with(["client", 'observation'])->first();

        return response()->json($consulta);
    }

    public function getObservaciones($id)
    {
        $ob = Observation::where("consult_id", $id)
            ->orderBy("id", "desc")
            ->paginate(4);

        return response()->json($ob);
    }

    public function ChangeEstadoConsulta($id, $estado)
    {
        $consulta = Consult::where("id", $id)->first();

        $consulta->estado = $estado;
        if($estado == "Pagado")
        $consulta->pagado = true;
        $consulta->save();

        $ob = new Observation();
        $ob->consult_id = $id;
        $ob->observacion = "Sin Observaciones";
        $ob->estado = $estado;
        $ob->save();
    }

    public function donwload(Request $request)
    {

        return Storage::disk('public')->download('voucher/' . $request->image);
    }

    public function getRol($id)
    {
        $user = User::find($id);

        $rol = $user->getRoleNames()["0"];

        return response()->json($rol);
    }

    public function getLink()
    {
        $link = Whatsapp::all();

        return response()->json($link);
    }

    public function getEvento($id)
    {
        $user = User::where('id',$id)->with("abogado")->first();;

        $rol = $user->getRoleNames()["0"];

        if ($rol == "Admin") {
            $ev = Event::all();
        } else {
            $ev = Event::where("abogado_id", $user->id)->get();
        }


        $mostrar = array();
        foreach ($ev as $events) {
            $nuevo = array(
                'title' => $events->titulo,
                'start' => $events->fecha
            );

            $mostrar[] = $nuevo;
        }

        return response()->json(json_encode($mostrar));
    }

    public function getEventoUser($id)
    {
        $user = User::where('id',$id)->with("abogado")->first();

        $rol = $user->getRoleNames()["0"];

        if ($rol == "Admin") {
            $ev = Event::with("abogado")->paginate(4);
        } else {
            $ev = Event::where("abogado_id", $user->abogado->id)->with("abogado")->paginate(4);
        }

        return response()->json($ev);
    }

    public function getDetallesEvento($evento)
    {
        $evn = Event::find($evento);

        return response()->json($evn);
    }

    public function MarkNotifications($id)
    {
       $user = User::find($id);

       $user->unreadNotifications->markAsRead();
    }

    public function InfoDashboard()
    {
        
    }
}
