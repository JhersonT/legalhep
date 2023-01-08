<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\User;
use App\Models\Modality;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AbogadoController extends Controller
{

    public function index(Request $request)
    {
        $servicios = Modality::where("name", "LIKE", "%" . $request->buscador . "%")->where("type", 1)->paginate(5);

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
        $servicio->type = 1;
        $servicio->save();
    }

    public function edit($id)
    {
        $servicio = Modality::find($id);

        return response()->json($servicio);
    }

    public function update(Request $request, $id)
    {
        $servicio = Modality::find($id);

        if ($request->hasFile("img")) {

            if ($servicio->image === "") {
                $nombre = Str::uuid() . "." . $request->img->getClientOriginalExtension();
                Storage::disk('public')->put("/servicio/abogado/" . $nombre,  file_get_contents($request->file('img')));
            } else if ($servicio->image !== "") {
                if (Storage::disk('public')->exists("servicio/abogado/" . $servicio->image)) {
                    $path = public_path("\storage\\servicio\\abogado\\" . $servicio->image);
                    unlink($path);
                    $nombre = Str::uuid() . "." . $request->img->getClientOriginalExtension();
                    Storage::disk('public')->put("/servicio/abogado/" . $nombre,  file_get_contents($request->file('img')));
                } else {
                    $nombre = Str::uuid() . "." . $request->img->getClientOriginalExtension();
                    Storage::disk('public')->put("/servicio/abogado/" . $nombre,  file_get_contents($request->file('img')));
                }
            }
        }

        $servicio->name = $request->nombre;
        $servicio->price = $request->precio;
        $servicio->image = $request->hasFile("img") ? $nombre : $servicio->image;
        $servicio->save();
    }


    public function destroy($id)
    {
        $servicio = Modality::find($id);


        if ($servicio->image !== "") {
            if (Storage::disk('public')->exists("servicio/abogado/" . $servicio->image)) {
                $path = public_path("\storage\\servicio\\abogado\\" . $servicio->image);
                unlink($path);
            }
        }

        $servicio->delete();
    }

    public function createAbogado(Request $request)
    {
        $email = User::where("email", $request->email)->first();

        if ($email) {
            return response()->json("error", 500);
        } else {
            $user = new User();
            $user->name = $request->nombre . " " . $request->apellido;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            $user->assignRole("Abogado");
            $user->save();

            $abogado = new Abogado();
            $abogado->user_id = $user->id;
            $abogado->nombre = $request->nombre;
            $abogado->apellido = $request->apellido;
            $abogado->departamento = $request->departamento;
            $abogado->email = $request->email;
            $abogado->celular = $request->celular;
            $abogado->save();
        }
    }

    public function showAbogados(Request $request)
    {
        $filtro = $request->buscador;

        $abogados = Abogado::where("nombre","LIKE","%".$filtro."%")
                            ->where("apellido","LIKE","%".$filtro."%")
                            ->where("departamento","LIKE","%".$filtro."%")
                            ->where("email","LIKE","%".$filtro."%")
                            ->where("celular","LIKE","%".$filtro."%")
                            ->paginate(6);

    return response()->json($abogados);
    }

    public function getSubcategorias()
    {
        $sub = Subcategory::all();

        return response()->json($sub);
    }

    public function editAbogado($id)
    {
        $abo = Abogado::where("id",$id)->first();

        return response()->json($abo);
    }
    public function updateAbogado(Request $request,$id)
    {

        $abogado = Abogado::where("id",$id)->with("user")->first();

        $user = User::find($abogado->user->id);

        $user->name = $request->nombre." ".$request->apellido;
        $user->email = $request->email;
        if($request->password !== null)
        $user->password = Hash::make($request->password);
        $user->save();

        $abogado->nombre = $request->nombre;
        $abogado->apellido = $request->apellido;
        $abogado->departamento = $request->departamento;
        $abogado->email = $request->email;
        $abogado->celular = $request->celular;
        $abogado->estado = $request->estado === "0" ? true :false ;
        $abogado->save();
    }
}
