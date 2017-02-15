<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Validator;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    { 
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));
    		$categorias=DB::table('categorias')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idcategoria','desc')
    		->paginate(7);
    		return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("almacen.categoria.create");
    }

    public function store (CategoriaFormRequest $request)
    {
        $time_start = microtime(true);
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        $request->session()->flash('success', 'La categoria se registró exitosamente!');
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $request->session()->flash('segundos',$time);
        return Redirect::to('almacen/categoria');


    }

    public function show($id)
    {
    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);

    }

    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $time_start = microtime(true);
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        $request->session()->flash('success', 'La categoria se actualizo exitosamente!');
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $request->session()->flash('segundos',$time);
        return Redirect::to('almacen/categoria');    	
    }

    public function destroy($id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
        session()->flash('success', 'La categoria se elimino exitosamente!');
    	return Redirect::to('almacen/categoria');
    }
}
