<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categorias = Category::where("name", "LIKE", "%" . $request->buscador . "%")->paginate(5);

        return response()->json($categorias);
    }

    public function store(Request $request)
    {

        if ($request->hasFile("image")) {
            $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
            Storage::disk('public')->put("categoria/" . $nombre,  file_get_contents($request->file('image')));
        }

        $categoria = new Category();
        $categoria->name = $request->nombre;
        $categoria->image = $request->hasFile("image") ? $nombre : null;
        $categoria->save();
    }

    public function edit($id)
    {
        $categoria =  Category::where("id", $id)->first();
        return response()->json($categoria);
    }

    public function update($id, Request $request)
    {
        $categoria = Category::where('id', $id)->first();

        if ($request->hasFile("image")) {

            if ($categoria->image === null || $categoria->image === ""  ) {
                $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                Storage::disk('public')->put("image/" . $nombre,  file_get_contents($request->file('image')));
            } else if ($categoria->image !== null || $categoria->image !== "" ) {
                if (Storage::disk('public')->exists("image/" . $categoria->image)) {
                    $path = public_path("\storage\\image\\".$categoria->image);
                    unlink($path);
                    $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                    Storage::disk('public')->put("image/" . $nombre,  file_get_contents($request->file('image')));
                }else{
                    $nombre = Str::uuid() . "." . $request->image->getClientOriginalExtension();
                    Storage::disk('public')->put("image/" . $nombre,  file_get_contents($request->file('image')));
                }
            }
        }

        $categoria->name = $request->nombre;
        $categoria->image = $request->hasFile("image") ? $nombre : $categoria->image;
        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Category::where("id",$id)->first();
        
        if ($categoria->image !== null ) {
            if (Storage::disk('public')->exists("image/" . $categoria->image)) {
                $path = public_path("\storage\\image\\".$categoria->image);
                unlink($path);
            }
        }

        $categoria->delete();
    }

    public function getCategorias()
    {
        $categorias = Category::all();

        return response()->json($categorias);
    }
}
