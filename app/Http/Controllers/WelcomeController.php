<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;
use App\Ingreso;
use App\Venta;
class WelcomeController extends Controller
{
    public function index()
    {
    	$cliente_count = Persona::where('tipo_persona','Cliente')->get()->count();
    	$proveedor_count = Persona::where('tipo_persona','Proveedor')->get()->count();
    	$compras_count = Ingreso::get()->count();
    	$ventas_count = Venta::get()->count();
    	return view('welcome',compact('cliente_count','proveedor_count','compras_count','ventas_count'));
    }
}
