<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    //

    public function calculadoraView()
    {
        return view("calculadora.calculadora");
    }

    public function  alcabalaView()
    {
        return view("calculadora.alcabala");
    }
    public function impuestoView()
    {
        return view("calculadora.impuestos");
    }
    public function igvView()
    {
        return view("calculadora.igv");
    }
}
