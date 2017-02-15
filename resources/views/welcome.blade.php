@extends ('layouts.app')
@section ('contenido')
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $cliente_count }}</h3>
				<h4>Clientes</h4>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="{{url('/ventas/cliente')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{$proveedor_count}}</h3>
				<h4>Proveedores</h4>
			</div>
			<div class="icon">
				<i class="ion ion-ios-people-outline"></i>
			</div>
			<a href="{{url('/compras/proveedor')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{$compras_count}}</h3>
				<h4>Compras</h4>
			</div>
			<div class="icon">
				<i class="ion ion-ios-cart-outline"></i>
			</div>
			<a href="{{url('/compras/ingreso')}}" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{$ventas_count}}</h3>
				<h4>Ventas</h4>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="{{url('/ventas/venta')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->

	<div class="col-md-12">
		<div class="panel panel-danger">
			<h3>Misión</h3>
			<div class="panel-body">Nuestra misión es comercializar productos de calidad para fabricantes de calzado en la ciudad de Trujillo. Contando con un grupo humano competente y capacitado enfocados en satisfacer a nuestros clientes.</div>
		</div>

		<div class="panel panel-default">
			<h3>Visión</h3>
			<div class="panel-body">
				En el año 2020, buscamos ser reconocidos en el ámbito regional como una empresa líder en la comercialización de productos para la fabricación de calzado dentro de un entorno económico rentable.
			</div>
		</div>
		
	</div>
	
	
</div><!-- /.row -->
@endsection

