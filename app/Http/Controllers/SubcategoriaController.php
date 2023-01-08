<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoriaController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile("image")) {
            $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
            Storage::disk('public')->put("categoria/subcategoria/" . $nombre,  file_get_contents($request->file('image')));
        }

        $subcategori = new Subcategory();
        $subcategori->name = $request->subcategoria;
        $subcategori->categorie_id = $request->categoria;
        $subcategori->image = $request->hasFile("image") ? $nombre : null;
        $subcategori->requisitos = $request->requisitos;
        $subcategori->precio = 200;
        $subcategori->save();
    }

    public function index(Request $request)
    {
        $filtro = $request->buscador;

        $subcat = Subcategory::where("name","LIKE","%".$filtro."%")->with("categori")->paginate(4);

        return response()->json($subcat);
    }

    public function edit($id)
    {
        $sub = Subcategory::where("id",$id)->with("categori")->first();

        return response()->json($sub);
    }

    public function update(Request $request,$id)
    {
        $sub = Subcategory::find($id);

        if ($request->hasFile("image")) {

            if ($sub->image === null || $sub->image === ""  ) {
                $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                Storage::disk('public')->put("categoria/subcategoria/" . $nombre,  file_get_contents($request->file('image')));
            } else if ($sub->image !== null || $sub->image !== "" ) {
                if (Storage::disk('public')->exists("categoria/subcategoria/" . $sub->image)) {
                    $path = public_path("\storage\\categoria\\subcategoria\\".$sub->image);
                    unlink($path);
                    $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                    Storage::disk('public')->put("categoria/subcategoria/" . $nombre,  file_get_contents($request->file('image')));
                }else{
                    $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                    Storage::disk('public')->put("categoria/subcategoria/" . $nombre,  file_get_contents($request->file('image')));
                }
            }
        }

        $sub->categorie_id = $request->categoria;
        $sub->name = $request->subcategoria;
        $sub->requisitos = $request->requisitos;
        $sub->image = $request->hasFile("image")? $nombre : $sub->image;
        $sub->save();
    }

    public function destroy($id){

        $sub = Subcategory::where("id",$id)->first();

        if ($sub->image !== null ) {
            if (Storage::disk('public')->exists("categoria/subcategoria/" . $sub->image)) {
                $path = public_path("\storage\\categoria\\subcategoria\\".$sub->image);
                unlink($path);
            }
        }

        $sub->delete();
    }

    public function getSubcategorias()
    {
        $sub = Subcategory::all();

        return response()->json($sub);
    }
}
