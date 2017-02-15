@extends ('layouts.app')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Código</th>
					<th>Categoría</th>
					<th>Stock</th>
					<th>Estado</th>
				</thead>
				<tbody id="datosProductos">
				</tbody>  
			</table>      
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script >
			var route = 'http://localhost/sistema/public/reportes/product';
			var tablaDatos = $("#datosProductos");
		$.get(route, function(res){
			$(res).each(function(key,value){
				
			tablaDatos.append("<tr><td>"+value.idarticulo+"</td><td>"+value.nombre+"</td><td>"+value.codigo+"</td><td>"+value.idcategoria+"</td><td>"+value.stock+"</td><td>"+value.estado+"</td></tr>");

				
			});
		});
	</script>
	
@endsection
