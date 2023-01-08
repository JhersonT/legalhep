<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{


    public function update(Request $request, $evento)
    {
        $evento = Event::where("id",$evento)->first();
        
        $evento->abogado_id = $request->abogado;
        $evento->titulo = $request->titulo;
        $evento->fecha = $request->fecha;
        $evento->save();
    }

    public function create(Request $request,$id)
    {
        $user = User::where("id",$id)->with("abogado")->first();

        $rol = $user->getRoleNames()["0"];

        if ($rol == "Admin") {
            $eve = new Event();
            $eve->abogado_id = $request->abogado;
            $eve->titulo = $request->titulo;
            $eve->fecha = $request->fecha;
            $eve->consult_id = 0;
            $eve->creador = $user->id;
            $eve->save();
        } else {
            $eve = new Event();
            $eve->abogado_id = $user->abogado->id;
            $eve->titulo = $request->titulo;
            $eve->fecha = $request->fecha;
            $eve->consult_id = 0;
            $eve->creador = $user->abogado->id;
            $eve->save();
        }
    }

    public function donwload(Request $request)
    {
        return Storage::disk('public')->download('expediente/documento/'.$request->image);
    }

    public function destroy($evento)
    {
        $evento = Event::where("id",$evento)->first();
        $evento->delete();
    }

}
