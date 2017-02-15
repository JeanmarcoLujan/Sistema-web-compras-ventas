@extends ('layouts.app')
@include('toast.toast')
@section ('contenido')
	<div class="row">
		<div class="col-md-12">
			<h3>Nuevo Producto</h3>
			@include('errors.alert')
		</div>
	</div>

		{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}

    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" 
                 value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            </div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
            	<label>Unidades de medida</label>
            	<select name="unit_id" class="form-control">
                    <option disabled selected>Seleccionar unidad de medida</option>
            		@foreach ($units as $unit)
            			<option value="{{$unit->id}}">{{$unit->descripcion}}</option>
            		@endforeach
            	</select>
            </div>
    	</div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Categoría</label>
                <select name="idcategoria" class="form-control">
                    <option disabled selected>Seleccionar categoria</option>
                    @foreach ($categorias as $cat)
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label for="codigo">Código</label>
            	<input type="text" name="codigo"  value="{{old('codigo')}}" class="form-control" placeholder="Código...">
            </div>
    	</div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="stock_minimo">Stock Minimo</label>
                <input type="text" name="stock_minimo"  value="{{old('stock_minimo')}}" class="form-control" placeholder="Stock minimo..">
            </div>
        </div>
    	<div class="col-md-2">
    		<div class="form-group">
            	<label for="stock">Stock</label>
            	<input type="text" name="stock"  value="{{old('stock')}}" class="form-control" placeholder="Stock...">
            </div>
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Descripcion</label>
            	<input type="text" name="descripcion"  value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion...">
            </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control" placeholder="Imagen...">
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