<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = $request->buscador;

        $services = Services::where("name","LIKE","%".$filtro."%")->with("subcategorie")->paginate(5);

        return response()->json($services);
    }

    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
            Storage::disk('public')->put("servicio/subcategoria/" . $nombre,  file_get_contents($request->file('image')));
        }
        
        $ser = new Services();
        $ser->subcategorie_id = $request->subcategoria;
        $ser->name = $request->nombre;
        $ser->precio = $request->precio;
        $ser->image = $request->hasFile("image")? $nombre : null;
        $ser->save();
    }

}
