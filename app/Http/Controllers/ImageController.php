<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function updateImagenPerfil(Request $request)
    {
       
        $client = Client::where('user_id',$request->id)->first();

        if($request->hasFile("img_perfil")){

            if ($client->img_perfil) {
                $path = public_path('perfil/') . $client->img_perfil;
                unlink($path);
                $nombre =Str::uuid().".".$request->img_perfil->getClientOriginalExtension() ;
                $request->img_perfil->move(public_path('/perfil'), $nombre);
            }else{
                $nombre =Str::uuid().".".$request->img_perfil->getClientOriginalExtension() ;
                $request->img_perfil->move(public_path('/perfil'), $nombre);
            }
            }

        $client->img_perfil = $request->hasFile("img_perfil")? $nombre : $client->img_perfil;
        $client->save();
    }
}
