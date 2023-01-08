<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{

    public function index(Request $request)
    {
        $cupones = Coupon::where("codigo","LIKE","%".$request->buscador."%")->paginate(5);

        return response()->json($cupones);
    }

    public function store(Request $request)
    {
        $cupon = new Coupon();
        $cupon->codigo = $request->codigo;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->usado = false;
        $cupon->save();
    }

    public function edit($id)
    {
        $cupon = Coupon::find($id);

        return response()->json($cupon);
    }

    public function update(Request $request, $id)
    {
        $cupon = Coupon::find($id);
        $cupon->codigo = $request->codigo;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->save();
    }

    public function destroy($id)
    {
        $cupon = Coupon::find($id);
        $cupon->delete();
    }
}
