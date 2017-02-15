@extends ('layouts.app')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos </h3>

		<form action="{{ url('reportes/compras')}}" method="GET">
			<div class='col-md-3'>
				<div class="form-group">
					<div class='input-group'>
						<input type='date' class="form-control" name="fecha_inicial" value="{{$fecha_inicial}}" />
					</div> 
				</div>
			</div>
			<div class='col-md-3'>
				<div class="form-group">
					<div class='input-group' >
						<input type='date' class="form-control" name="fecha_final" value="{{$fecha_final}}" />
					</div>
				</div>
			</div>
			<div class='col-md-3'>
				<div class="form-group">
					<div class='input-group' >
						<input type='submit' class="form-control btn btn-primary" />
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<tr align="center">
					<td><h4><label>Fecha</label></h4></td>
					<td><h4><label>Proveedor</label></h4></td>
					<td><h4><label>Tipo Comprob.</label></h4></td>
					<td><h4><label>Serie Comprob.</label></h4></td>
					<td><h4><label>Número Comprob.</label></h4></td>
					<td><h4><label>Estado</label></h4></td>
				</tr>
               @foreach ($ingresos as $ing)
				<tr align="center">
					
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->proveedor->nombre}}</td>
					<td>{{ $ing->tipo_comprobante}}</td>
					<td>{{ $ing->serie_comprobante}}</td>
					<td>{{ $ing->num_comprobante}}</td>
					<td>{{ $ing->estado}}</td>
				</tr>
			
				@endforeach
			</table>
		</div>

	</div>
</div>


@endsection