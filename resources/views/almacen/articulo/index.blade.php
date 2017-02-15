@extends ('layouts.app')
@include('toast.toast')
@section ('contenido')
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a>  <a href="{{ url('/pdfproductos')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h3>
		@include('almacen.articulo.search')
	</div>
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Unidad de medida</th>
					<th>Código</th>
					<th>Categoría</th>
					<th>Stock Minimo</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($articulos as $art)
				<tr>
					<td>{{ $art->idarticulo }}</td>
					<td>{{ $art->nombre}}</td>
					<td>{{ $art->unit->descripcion}}</td>
					<td>{{ $art->codigo}}</td>
					<td>{{ $art->categoria->nombre }}</td>
					@if($art->stock_minimo >= $art->stock)
						<th style="background-color:red">{{ $art->stock_minimo}}</th>
					@else
						<th>{{ $art->stock_minimo}}</th>
					@endif
					<td>{{ $art->stock}}</td>
					<td>
						<button type="button" data-toggle="modal" data-target="#modal{{ $art->idarticulo }}"><img src="{{ asset('imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="100px" width="100px" class="img-thumbnail"></button>
						
					</td>
					<td>{{ $art->estado}}</td>
					<td>
						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.articulo.modal')
				@endforeach
			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>
@foreach ($articulos as $art)
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal{{ $art->idarticulo }}">
  <div class="modal-dialog modal-lg" role="document">
  	
    <div class="modal-content">
    	<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    		<h4 class="modal-title" id="myModalLabel">Fotografía: <label>{{$art->nombre}}</label></h4>
    	</div>
    	<div class="modal-body">
    		<div align="center">
    			<img src="{{ asset('imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="500px" width="500px" class="img-thumbnail">
    		</div>
    	</div>
    </div>
  </div>
</div>
@endforeach

@endsection


