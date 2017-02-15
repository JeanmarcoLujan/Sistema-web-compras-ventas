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
		<h3>Listado de Categorías <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.categoria.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
				@if ($categorias->count() > 0)
	               @foreach ($categorias as $cat)
					<tr>
						<td>{{ $cat->idcategoria}}</td>
						<td>{{ $cat->nombre}}</td>
						<td>{{ $cat->descripcion}}</td>
						<td>
							<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
	                        <a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('almacen.categoria.modal')
					@endforeach
				@else
					<tr>
						<td colspan="5"><label>No hay resultados</label></td>
					</tr>
				@endif
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>

@endsection