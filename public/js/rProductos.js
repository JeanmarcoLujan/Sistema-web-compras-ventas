$(document).ready(function () {
	var tablaDatos = $("#datosProductos");
	var route = "http://localhost:8000/reportes/product";


	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.idarticulo+"</td><td>"+value.nombre+"</td><td>"+value.codigo+"</td><td>"+value.idcategoria+"</td><td>"+value.stock+"</td><td>"+value.estado+"</td></tr>");
		});
	});
});