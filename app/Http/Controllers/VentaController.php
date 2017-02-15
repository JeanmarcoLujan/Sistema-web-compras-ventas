<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VentaFormRequest;
use App\Venta;
use App\DetalleVenta;
use DB;
use Carbon\Carbon;
use Reponse;
use Illuminate\Support\Collection;
use PDF;


class VentaController extends Controller
{
    public function __construct()
    { 
    	
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ventas=Venta::where('num_comprobante','LIKE','%'.$query.'%')->where('estado','=','A')->paginate(7);
            return view('ventas.venta.index',compact('ventas', 'query'));
        }
    }
    public function create()
    {
    	$personas=DB::table('personas')->where('tipo_persona','=','Cliente')->get();
    	$articulos = DB::table('articulos as art')
    	->join('detalle_ingresos as di', 'art.idarticulo','=','di.idarticulo')
    		->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo','art.stock', 'di.precio_venta_unitario as precio_unitario')
    		->where('art.estado','=','Activo')
    		->where('art.stock','>','0')
    		->groupBy('articulo','art.idarticulo','art.stock')
    		->get();
    	return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    public function store(VentaFormRequest $request)
    {
        $time_start = microtime(true);
        try{
            DB::beginTransaction();
            $venta=new Venta();
            $venta->idcliente=$request->get('idcliente');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->serie_comprobante=$request->get('serie_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            
            $mytime = Carbon::now('America/Lima');
            $venta->fecha_hora=$mytime->toDateTimeString();
          
            $venta->estado='A';
            $venta->save();

            $idarticulo=$request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_venta=$request->get('precio_venta');

            $cont=0;

            while ($cont<count($idarticulo)) {
                $detalle = new DetalleVenta();
                $detalle->idventa=$venta->idventa;
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descuento= $descuento[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
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
        return Redirect::to('ventas/venta');
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        $detalles = DetalleVenta::where('idventa','=',$id)->get(); 
        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
        $venta=Venta::findOrFail($id);
        $venta->Estado='C'; //A:Aceptada; C:Cancelada
        $venta->update();
        return Redirect::to('ventas/venta');
    }

    public function pdf($id)
    {
        $venta=DB::table('ventas as v')
            ->join('personas as p','v.idcliente','=','p.idpersona')
            ->join('detalle_ventas as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado')
            ->where('v.idventa','=',$id)
            ->first();

        $detalles=DB::table('detalle_ventas as d')
            ->join('articulos as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta') 
            ->where('d.idventa','=',$id)->get();  

        $pdf = PDF::loadView('ventas.venta.ver',["venta"=>$venta,"detalles"=>$detalles]);
             return $pdf->stream();
    }

    public function formListaVentas(Request $request)
    {


        $fecha_inicial_venta = trim($request->get('fecha_inicial_venta'));
        $fecha_final_venta = trim($request->get('fecha_final_venta'));

        if ($fecha_inicial_venta == "" || $fecha_final_venta=="") {
            $ventas = Venta::all();
            $fecha_inicial_venta="";
            $fecha_final_venta ="";
            return view("reportes.ventas", compact('ventas','fecha_inicial_venta','fecha_final_venta'));
        }else{
            $ventas = Venta::where('fecha_hora','>=',$fecha_inicial_venta)->where('fecha_hora','<=',$fecha_final_venta)->get();
            return view("reportes.ventas", compact('ventas','fecha_inicial_venta','fecha_final_venta'));
        }

    }
}
