<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1 align="center">Ventas</h1>


	<div class="row">
        <div >
            <div class="form-group">
                <label >Cliente</label>
                <p>{{$venta->nombre}}</p>
            </div>
        </div>
        <div >
            <div class="form-group">
                <label >Tipo Comprobante</label>
                <p>{{$venta->tipo_comprobante}}</p>
            </div>
        </div>
        <div >
            <div class="form-group">
                <label for="serie_comprobante">Serie Comprobante</label>
                <p>{{$venta->serie_comprobante}}</p>
            </div>
        </div>
        <div >
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <p>{{$venta->num_comprobante}}</p>            
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panle-primary">
            <div class="panel-body">          
                <h3>Detalle de la venta</h3>
                <div class="">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <tr>
                            	<th>Articulo</th>
                                <th>Cantidad</th>
                                <th>Precio Venta</th>
                                <th>Descuento</th>
                                <th>Subtotal</th>
                            </tr>  
                        </thead>

                        <tbody>
                            @foreach($detalles as $det)
                            <tr>
                                <td>{{$det->articulo}}</td>
                                <td>{{$det->cantidad}}</td>
                                <td>{{$det->precio_venta}}</td>
                                <td>{{$det->descuento}}</td>
                                
                                <td>{{$det->cantidad*$det->precio_venta +$det->cantidad*$det->precio_venta*0.18 - $det->descuento}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                        		<th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total"></h4></th>
                        	</tr> 
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>