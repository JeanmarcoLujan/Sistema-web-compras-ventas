<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\ArticuloFormRequest;
use App\Articulo;
use App\Unit;
use App\Categoria;
use DB;
use PDF;
use DateTime;



class ArticuloController extends Controller
{
    public function __construct()
    { 
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
       
        if ($request) {
            $query = trim($request->get('searchText'));
            $articulos = Articulo::where('nombre','LIKE','%'.$query.'%')
                                    ->orwhere('codigo','LIKE','%'.$query.'%')
                                    ->paginate(4);
            return view('almacen.articulo.index',compact('articulos','query'));
        }
        
    }

    public function create()
    {

        $categorias=Categoria::where('condicion','=','1')->get();
        $units=Unit::all();
    	return view("almacen.articulo.create",compact('categorias', 'units'));
    }

    

    public function store (ArticuloFormRequest $request)
    {
        
        $time_start = microtime(true);
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->unit_id=$request->get('unit_id');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock_minimo=$request->get('stock_minimo');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if (Input::hasFile('imagen')) {
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->save();
        $request->session()->flash('success', 'El producto se registro exitosamente!');
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $request->session()->flash('segundos',$time);
        //sleep ( int $seconds )
        return Redirect::to('almacen/articulo');

    }

    public function show($id)
    {
    	return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);

    }

    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categorias')->where('condicion','=','1')->get();
    	$units=Unit::all();
    	return view("almacen.articulo.edit",compact('articulo','categorias','units'));
    }

    public function update(ArticuloFormRequest $request, $id)
    {
        $time_start = microtime(true);
    	$articulo=Articulo::findOrFail($id);
    	$articulo->idcategoria=$request->get('idcategoria');
        $articulo->unit_id=$request->get('unit_id');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock_minimo=$request->get('stock_minimo');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');

        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
    	$articulo->update();
        $request->session()->flash('success', 'El producto se actualizo exitosamente!');
        //sleep (10);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $request->session()->flash('segundos',$time);
        
    	return Redirect::to('almacen/articulo');
    }

    public function destroy($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$articulo->estado='Inactivo';
    	$articulo->update();
        session()->flash('success', 'El producto se elimino exitosamente!');
    	return Redirect::to('almacen/articulo');
    }

    public function pdfproductos()
    {
        
            $articulos=DB::table('articulos as a')
            ->join('categorias as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->orderBy('a.idarticulo','asc')
            ->get();

            $pdf = PDF::loadView('reportes/pdfProductos',['articulos'=> $articulos]);
             return $pdf->stream();
            
    }

    public function listarProductos()
    {
        $productos = Articulo::all();
        return response()->json(
            $productos->toArray()
        );
    }

    public function listarReporteProductos()
    {
       return view("reportes.productos");
    }
}
