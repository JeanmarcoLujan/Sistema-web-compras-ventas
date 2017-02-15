<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;
use App\Ingreso;
use App\DetalleIngreso;
use DB;
use Carbon\Carbon;
use Reponse;
use Illuminate\Support\Collection;
use PDF;


class IngresoController extends Controller
{
    public function __construct()
    { 
    	
    }

    public function index(Request $request)
    {
       
        if ($request) {
            $query = trim($request->get('searchText'));
            $ingresos=Ingreso::where('num_comprobante','LIKE','%'.$query.'%')
                                ->where('estado','=','A')
                                ->paginate(7);
            return view('compras.ingreso.index',compact('ingresos','query'));
        }
    }
    public function create()
    {
    	$personas=DB::table('personas')->where('tipo_persona','=','Proveedor')->get();
    	$articulos = DB::table('articulos as art')
    		->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
    		->where('art.estado','=','Activo')
    		->get();
    	return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    public function store(IngresoFormRequest $request)
    {
        $time_start = microtime(true);
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso();
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->num_comprobante=$request->get('num_comprobante');

            $mytime = Carbon::now('America/Lima');
            $ingreso->fecha_hora=$mytime->toDateTimeString();
            $ingreso->estado='A';
            $ingreso->save();

            $idarticulo=$request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $precio_venta_unitario=$request->get('precio_venta_unitario');


            $cont=0;

            while ($cont<count($idarticulo)) {
                $detalle = new DetalleIngreso();
                $detalle->idingreso=$ingreso->idingreso;
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_venta_unitario= $precio_venta_unitario[$cont];

                $detalle->save();
                $cont=$cont+1;
            }


            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $request->session()->flash('segundos',$time);
        
        return Redirect::to('compras/ingreso');
    }

    public function show($id)
    {
        
        $ingreso = Ingreso::findOrFail($id);
        $detalles = DetalleIngreso::where('idingreso',$id)->get();

        return view("compras.ingreso.show",compact('ingreso','detalles'));
    }

    public function destroy($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }

    public function pdf($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $detalles = DetalleIngreso::where('idingreso',$id)->get();

        $pdf = PDF::loadView('compras.ingreso.ver',compact('ingreso','detalles'));
             return $pdf->stream();
    }


    public function formListaCompras(Request $request)
    {
        $fecha_inicial = trim($request->get('fecha_inicial'));
        $fecha_final = trim($request->get('fecha_final'));

        if ($fecha_inicial == "" || $fecha_final=="") {
            $ingresos = Ingreso::all();
            $fecha_inicial="";
            $fecha_final ="";
            return view("reportes.compras", compact('ingresos','fecha_inicial','fecha_final'));
        }else{
            $ingresos = Ingreso::where('fecha_hora','>=',$fecha_inicial)->where('fecha_hora','<=',$fecha_final)->get();
            return view("reportes.compras", compact('ingresos','fecha_inicial','fecha_final'));
        }
        
        
    }
}
