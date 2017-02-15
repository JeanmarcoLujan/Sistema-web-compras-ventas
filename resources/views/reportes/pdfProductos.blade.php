<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1 align="center">Listado de Productos</h1>


	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Código</th>
				<th>Categoría</th>
				<th>Stock</th>
				<th>Imagen</th>
				<th>Estado</th>	

			</tr>					
		</thead>
		<tbody>
			@foreach ($articulos as $art)
				<tr>
					<td>{{ $art->idarticulo }}</td>
					<td>{{ $art->nombre}}</td>
					<td>{{ $art->codigo}}</td>
					<td>{{ $art->categoria }}</td>
					<td>{{ $art->stock}}</td>
					<td>
						<img src="imagenes/articulos/{{$art->imagen}}" alt="{{ $art->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>{{ $art->estado}}</td>
				</tr>
			@endforeach
		</tbody>
					
	</table>

</body>
</html>
