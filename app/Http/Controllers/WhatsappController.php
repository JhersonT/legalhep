<?php

namespace App\Http\Controllers;

use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhatsappController extends Controller
{
   
    public function index()
    {
        $links = Whatsapp::paginate(2);

        return response()->json($links);
    }

    public function store(Request $request)
    {
        $links = Whatsapp::all();

        if ($links->count() === 0) {
            $link = new Whatsapp();
            $link->link = $request->enlace;
            $link->save();
        } else if ($links->count() === 1) {

            return response()->json()->setStatusCode(Response::HTTP_NOT_ACCEPTABLE);
        }
    }


    public function edit($id)
    {
        $link = Whatsapp::find($id);
        return response()->json($link);
    }

    public function update(Request $request,$id)
    {
        $link = Whatsapp::find($id);

        $link->link = $request->enlace;
        $link->save();
    }


    public function destroy($id)
    {
        $link = Whatsapp::find($id);
        $link->delete();
    }
}
