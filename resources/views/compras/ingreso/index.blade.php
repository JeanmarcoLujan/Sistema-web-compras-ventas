@extends ('layouts.app')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.ingreso.search')
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
					<td><h4><label>Opciones</label></h4></td>

				</tr>
               @foreach ($ingresos as $ing)
				<tr align="center">
					
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->proveedor->nombre}}</td>
					<td>{{ $ing->tipo_comprobante}}</td>
					<td>{{ $ing->serie_comprobante}}</td>
					<td>{{ $ing->num_comprobante}}</td>
					<td>{{ $ing->estado}}</td>
					<td>
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-info">Detalle</button></a>
                         <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
                         <a href="{{ url('/pdfIngreso',[$ing->idingreso])}}" target="_blank"><button class="btn btn-primary">PDF</button></a>
					</td>
				</tr>
				@include('compras.ingreso.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection