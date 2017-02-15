@extends ('layouts.app')
@include('toast.toast')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $articulo->nombre}}</h3>
			@include('errors.alert')
		</div>
	</div>

	{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
    {{Form::token()}}
     <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" >
            </div>
    	</div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Unidad de medida</label>
                <select name="unit_id" class="form-control">
                    @foreach ($units as $unit)
                        @if ($unit->id ==$articulo->unit_id)
                            <option value="{{$unit->id}}" selected>{{$unit->descripcion}}</option>
                        @else
                            <option value="{{$unit->id}}" >{{$unit->descripcion}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label>Categoría</label>
            	<select name="idcategoria" class="form-control">
            		@foreach ($categorias as $cat)
            			@if ($cat->idcategoria ==$articulo->idcategoria)
            				<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
            			@else
            				<option value="{{$cat->idcategoria}}" >{{$cat->nombre}}</option>
            			@endif
            		@endforeach
            	</select>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label for="codigo">Código</label>
            	<input type="text" name="codigo" required value="{{ $articulo->codigo}}" class="form-control" >
            </div>
    	</div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="stock_minimo">Stock Minimo</label>
                <input type="text" name="stock_minimo" required value="{{ $articulo->stock_minimo}}" class="form-control" >
            </div>
        </div>
    	<div class="col-md-2">
    		<div class="form-group">
            	<label for="stock">Stock</label>
            	<input type="text" name="stock" required value="{{ $articulo->stock}}" class="form-control" >
            </div>
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Descripcion</label>
            	<input type="text" name="descripcion" required value="{{$articulo->descripcion}}" class="form-control">
            </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
            	@if (($articulo->imagen)!="")
            		<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" width="250px" height="200px">
            	@endif
            </div>
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>


    </div>       

	{!!Form::close()!!}		
            
	
@endsection