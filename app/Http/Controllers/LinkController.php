<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
   
    public function index(Request $request)
    {
        $links = Link::where("name","LIKE","%".$request->buscador."%")->paginate(8);

        return response()->json($links);
    }

    public function store(Request $request)
    {
        $link = new Link();
        $link->name = $request->nombre;
        $link->url = $request->enlace;
        $link->save();
    }

    public function edit($id)
    {
        $link = Link::find($id);

        return response()->json($link);
    }

    public function update(Request $request,$id)
    {
        $link= Link::find($id);
        $link->name= $request->nombre;
        $link->url = $request->enlace;
        $link->save();
    }

    public function destroy($id)
    {
        Link::where("id",$id)->delete();
    }
}
