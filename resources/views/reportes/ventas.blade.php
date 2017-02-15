@extends ('layouts.app')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas</h3>
		<form action="{{ url('reportes/ventas')}}" method="GET">
			<div class='col-md-3'>
				<div class="form-group">
					<div class='input-group'>
						<input type='date' class="form-control" name="fecha_inicial_venta" value="{{$fecha_inicial_venta}}" />
					</div> 
				</div>
			</div>
			<div class='col-md-3'>
				<div class="form-group">
					<div class='input-group' >
						<input type='date' class="form-control" name="fecha_final_venta" value="{{$fecha_final_venta}}" />
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
				<thead>
					<th><h4><label>Fecha</label></h4></th>
					<th><h4><label>Cliente</label></h4></th>
					<th><h4><label>Tipo Comprob.</label></h4></th>
					<th><h4><label>Serie Comprob.</label></h4></th>
					<th><h4><label>Número Comprobante</label></h4></th>
					<th><h4><label>Estado</label></h4></th>

				</thead>
               @foreach ($ventas as $ven)
				<tr>
					
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->cliente->nombre}}</td>
					<td>{{ $ven->tipo_comprobante}}</td>
					<td>{{ $ven->serie_comprobante}}</td>
					<td>{{ $ven->num_comprobante}}</td>
					<td>{{ $ven->estado}}</td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection