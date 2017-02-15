@extends ('layouts.app')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('ventas.venta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th><h4><label>Fecha</label></h4></th>
					<th><h4><label>Cliente</label></h4></th>
					<th><h4><label>Tipo Comprob.</label></h4></th>
					<th><h4><label>Serie Comprob.</label></h4></th>
					<th><h4><label>Número Comprobante</label></h4></th>
					<th><h4><label>Estado</label></h4></th>
					<th><h4><label>Opciones</label></h4></th>

				</thead>
               @foreach ($ventas as $ven)
				<tr>
					
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->cliente->nombre}}</td>
					<td>{{ $ven->tipo_comprobante}}</td>
					<td>{{ $ven->serie_comprobante}}</td>
					<td>{{ $ven->num_comprobante}}</td>
					<td>{{ $ven->estado}}</td>
					<td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-info">Detalle</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					    <a href="{{ url('/pdfVenta',[$ven->idventa])}}" target="_blank"><button class="btn btn-primary">PDF</button></a>

					</td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@endsection