<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Support;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function inicio()
    {
        return view('panel.principal');
    }

    public function manualView()
    {
        $manual = Support::where('id',"1")->first();
        return view("manual.manual",['manual'=> $manual]);
    }

    public function enlacesView()
    {
        $enlaces = Link::all();
        return view("enlaces.enlaces",compact("enlaces"));
    }
}
