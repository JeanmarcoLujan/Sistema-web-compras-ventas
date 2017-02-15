@extends ('layouts.app')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Cliente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

	{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Razón Social</label>
            	<input type="text" name="nombre"  value="{{old('nombre')}}" class="form-control" placeholder="Razón Social...">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="direccion">Dirección</label>
            	<input type="text" name="direccion"  value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label>Documento</label>
            	<select name="tipo_documento" class="form-control">
	            	<option value="DNI">DNI</option>
	            	<option value="RUC">RUC</option>
	            	<option value="PAS">PAS</option>
            	</select>
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="num_documento">Número documento</label>
            	<input type="text" name="num_documento"  value="{{old('num_documento')}}" class="form-control" placeholder="Número de documento..">
            </div>
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="telefono">Teléfono</label>
            	<input type="text" name="telefono"  value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
            </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="email">Dirección Email</label>
            	<input type="text" name="email" class="form-control" placeholder="Email...">
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