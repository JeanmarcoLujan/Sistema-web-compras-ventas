<!DOCTYPE html>
<html>
<head>
	<title>Help!</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_all-skins.css') }}"> 
   <!-- <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <!--<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<style type="text/css">
		.btn{
			width: 100%;
			color: white;
			font-size: 20px;
			background-color: #20B2AA;
			border: hidden;
		}
		
	</style>

</head>
<body>
	<div class="container">
		<div align="center">
			<h1>Sistema de ayuda<small> Negocios y Servicios Lazaro Collantes Segundo  Germán</small></h1>
		</div><br><br>
		<div class="col-md-4">
			<div class="panel panel-primary">
			<h3 align="center"> Índice</h3>
			<hr>
				<div class="panel-body">
					<div class="">
						<button class="btn items" onclick="hola(this)" value="introduccion" id="item_introduccion"><i class="fa fa-info pull-left"></i>Introduccion</button><br>
						<button class="btn items" onclick="hola(this)" value="iniciar_sesion" id="item_iniciar_sesion" ><i class="fa fa-info pull-left"></i>Iniciar Sesión</button>
						<button class="btn items" onclick="hola(this)" value="registrarse" id="item_registrarse" ><i class="fa fa-info pull-left"></i>Registrarse</button>
						<button class="btn items" onclick="hola(this)" value="categoria" id="item_categoria" ><i class="fa fa-info pull-left"></i>Categorías</button>
						<button class="btn items" onclick="hola(this)" value="producto" id="item_producto" ><i class="fa fa-info pull-left"></i>Productos</button>
						<button class="btn items" onclick="hola(this)" value="proveedor" id="item_proveedor" ><i class="fa fa-info pull-left"></i>Proveedores</button>
						<button class="btn items" onclick="hola(this)" value="compra" id="item_compra" ><i class="fa fa-info pull-left"></i>Compras</button>
						<button class="btn items" onclick="hola(this)" value="cliente" id="item_cliente" ><i class="fa fa-info pull-left"></i>Clientes</button>
						<button class="btn items" onclick="hola(this)" value="venta" id="item_venta" ><i class="fa fa-info pull-left"></i>Ventas</button>
						<button class="btn items" onclick="hola(this)" value="reporte" id="item_reporte" ><i class="fa fa-info pull-left"></i>Reportes</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="introduccion" class="contenido">
						<h3 align="center">Introducción</h3>
						<hr>
						<div align="justify">
							Suministrar una guía que permita a los usuarios del sistema de compras y ventas
							de la empresa Negocios y Servicios Lazaro Collantes Segundo German interactura
							de forma efectiva con la aplicación.<br><br>
							La ayuda va dirigido a los usuarios del sistema, que necesiten saber como funciona el sistema.
							
						</div>
					</div>

					<div id="iniciar_sesion" class="contenido">
						<h3 align="center">Iniciar Sesion</h3>
						<hr>
						<div align="justify">
							Para iniciar sesion, en la aplicacion, deberá pulsar clic en el botón "Iniciar Sesion" 
							en la vetana que se muestra al inicio.<br>
							1.- Ingresar correo eléctronico.<br>
							2.- Ingresar la contraseña correcta.<br>
							3.- Pulsar clic en Iniciar sesion.<br>
							<div align="center">
							<img width="600px" height="200px" src="{{ asset('img/help/iniciar_sesion.jpg') }}">
							</div>

						</div>
					</div>

					<div id="registrarse" class="contenido">
						<h3 align="center">Registrarse</h3>
						<hr>
						<div>
							Para el registrarse, una vez que se encuentre en el formulario, debera ingresar los siguientes datos 
							obligatorios:<br>
							1.- Ingresar Nombres.<br>
							2.- Ingresar Apellidos.<br>
							3.- Ingresar direccion E-mail.<br>
							4.- Ingresar contraseña.<br>
							5.- Repetir la contraseña, por seguridad.<br>
							6.- Seleccionar una fotografía.<br>
							7.- Pulsar clic en el botón "Registrar"<br>
							<div align="center">
							<img width="600px" height="400px" src="{{ asset('img/help/registrousuario.jpg') }}">
							</div>

						</div>
					</div>

					<div id="categoria" class="contenido">
						<h3 align="center">Categoría</h3>
						<hr>
						<div>
							<h4><label>Ingresar a Categoría</label></h4><nr>
							En el menú lateral.<br>
							1.- Pulsar clic en el "Almacén"<br>
							2.- Seleccionar "Categorías"<br>
							<div align="center">
							<img width="250px" height="150px" src="{{ asset('img/help/select_categoria.jpg') }}">
							</div>

							<h4><label>Lista de Categorías</label></h4><hr>
							Al ingresar a categorías, se nos mostrará la lista de las categorías registrardas.<br>
							a.- Botón "Nuevo", para registrar una categoría nueva.<br>
							b.- Botón "Buscar", para buscar una categoría registrada, por su nombre.<br>
							c.- Botón "Editar", para editar los datos de una categoría registrada.<br>
							d.- Botón "Eliminar", para eliminar una categoría registrada.<br>
							<div align="center">
							<img width="700px" height="200px" src="{{ asset('img/help/lista_categoria.jpg') }}">
							</div>

							<h4><label>Nueva Categoría</label></h4><hr>
							Registrar una nueva categoría<br>
							1.- Ingresar "nombre" de la categoría.<br>
							2.- Ingresar la descripción de la categoría.<br>
							3.- Pulsar registrar
							<div align="center">
							<img width="400px" height="200px" src="{{ asset('img/help/nueva_categoria.jpg') }}">
							</div>

							<h4><label>Editar Categoría</label></h4><hr>
							Editar una nueva categoría<br>
							1.- Editarel nombre de la categoría.<br>
							2.- Editar la descripción de la categoría.<br>
							3.- Pulsar guardar

							<div align="center">
							<img width="400px" height="150px" src="{{ asset('img/help/editar_categoria.jpg') }}">
							</div>


							<h4><label>Eliminar Categoría</label></h4><hr>
							Al pulsar clic en el botón eliminar, nos emerge una ventana, preguntandono si queremos eliminar la categoría<br>
							Opciones:<br>
							a.- Confirmar, es decir se elimna la categría.<br>
							b.- Cancelamos la operacion.<br>
							<div align="center">
							<img width="400px" height="150px" src="{{ asset('img/help/eliminar_categoria.jpg') }}">
							</div>
						</div>
					</div>

					<div id="producto" class="contenido">
						<h3 align="center">Productos</h3>
						<hr>
						<div>
							Para registrar un producto, debemos ingresar el¿n el formulario, lo siguiente:<br>
							1.- Nombre del producto<br>
							2.- Seleccionar la unidad de medida<br>
							3.- Seleccionar la categoria<br>
							4.- Ingresar codigo<br>
							5.- Ingresar el stock<br>
							6.- Ingresar una descripcion del producto<br>
							7.- Seleccionar una imagen del producto<br>
							8.- Pulsar en el boton Guardar<br>

							<div align="center">
							<img width="700px" height="250px" src="{{ asset('img/help/nuevo_producto.jpg') }}">
							</div>
						</div>
					</div>

					<div id="proveedor" class="contenido">
						<h3 align="center">Proveedores</h3>
						<hr>
						<div>
							Para registra a los proveedores debemos ingresar los siguientes datos:<br>
							1.- Razon social<br>
							2.- Direccion del proveedor.<br>
							3.- Seleccionar el tipo del documento<br>
							4.- Numero del documento<br>
							5.- Telefono del proveedor<br>
							6.- E-mail del proveedor<br>

							<div align="center">
							<img width="700px" height="250px" src="{{ asset('img/help/nuevo_proveedor.jpg') }}">
							</div>
						</div>
					</div>

					<div id="compra" class="contenido">
						<h3 align="center">Compras</h3>
						<hr>
						<div>
							Registrar una nueva compra, debera realizar los siguiente:
							1.- Seleccionar el proveedor<br>
							2.- Seleccionar el tipo de comproante <br>
							3.- Ingresar la serie del comprobante<br>
							4.- Ingresar el numero del comprobante <br>
							Detalle<br>
							5.- Seleccionar el producto<br>
							6.- Ingresar la cantidad<br>
							7.- Ingresar el valor unitario<br>

							<div align="center">
							<img width="700px" height="250px" src="{{ asset('img/help/nueva_compra.jpg') }}">
							</div>

						</div>
					</div>

					<div id="cliente" class="contenido">
						<h3 align="center">Clientes</h3>
						<hr>
						<div>
							Para registra a los proveedores debemos ingresar los siguientes datos:<br>
							1.- Razon social<br>
							2.- Direccion del proveedor.<br>
							3.- Seleccionar el tipo del documento<br>
							4.- Numero del documento<br>
							5.- Telefono del proveedor<br>
							6.- E-mail del proveedor<br>

							<div align="center">
							<img width="700px" height="250px" src="{{ asset('img/help/nuevo_cliente.jpg') }}">
							</div>
						</div>
					</div>

					<div id="venta" class="contenido">
						<h3 align="center">Ventas</h3>
						<hr>
						<div>
							Registrar una nueva venta, debera realizar los siguiente:
							1.- Seleccionar el cliente<br>
							2.- Seleccionar el tipo de comproante <br>
							3.- Ingresar la serie del comprobante<br>
							4.- Ingresar el numero del comprobante <br>
							Detalle<br>
							5.- Seleccionar el producto<br>
							6.- Ingresar la cantidad<br>
							7.- Ingresar el descuento, si es que lo hubiera<br>

							<div align="center">
							<img width="700px" height="250px" src="{{ asset('img/help/nueva_venta.jpg') }}">
							</div>
						</div>
					</div>

					<div id="reporte" class="contenido">
						<h3 align="center">Reportes</h3>
						<hr>
						<div>
							* Hay reportes estadisticos, donde nos muestra, la cantidad  de compras y ventas que se han realizado en un determinado dia<br>
							* Hoy reporte en formato PDF<br>
						</div>
					</div>

				</div>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-2.2.0.min.js"><\/script>')</script>
	<script >
		$( "#item_introduccion").css("background-color","white");
		$( "#item_introduccion" ).css("color","black");
		$( ".contenido" ).css("display","none");
		$( "#introduccion" ).css("display","block");
		function hola (btn) {
			event.preventDefault();
			$( ".contenido" ).css("display","none");
			$( "#"+btn.value+"" ).css("display","block");
			$( ".items" ).css("background-color","#20B2AA");
			$( "#item_"+btn.value+"" ).css("background-color","white");
			$( ".items" ).css("color","white");
			$( "#item_"+btn.value+"" ).css("color","black");
		
		}

	</script>
</body>
</html>