<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function create(Request $request)
    {
        $taxes = Tax::all();

        if(count($taxes) == 0)
        {
            $tax = new Tax();
            $tax->impuesto = $request->uit;
            $tax->save();
        }else{
            return response()->json(["eror"=>"No funciona"],500);
        }
    }

    public function show()
    {
        $taxes = Tax::all();

        return response()->json($taxes);
    }

    public function destroy($id)
    {
        $tax = Tax::find($id);

        $tax->delete();
    }

    public function edit($id)
    {
        $tax = Tax::find($id);

        return response()->json($tax);
    }

    public function update(Request $request, $id)
    {
        $tax = Tax::where("id",$id)->first();

        $tax->impuesto = $request->uit;
        $tax->save();
    }
}
