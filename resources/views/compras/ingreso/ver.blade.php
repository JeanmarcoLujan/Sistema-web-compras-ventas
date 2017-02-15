<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1 align="center">Ingresos</h1>


	<div class="container">
    	<div>
    		<div class="form-group">
            	<label >Proveedor</label>
                <p>{{$ingreso->proveedor->nombre}}</p>
            </div>
    	</div>
    	<div >
    		<div class="form-group">
            	<label >Tipo Comprobante</label>
                <p>{{$ingreso->tipo_comprobante}}</p>
            </div>
    	</div>
    	<div>
    		<div class="form-group">
            	<label for="serie_comprobante">Serie Comprobante</label>
            	<p>{{$ingreso->serie_comprobante}}</p>
            </div>
    	</div>
        <div>
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <p>{{$ingreso->num_comprobante}}</p>            
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panle-primary">
            <div class="panel-body">          
                
                <div class="">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <tr>
                            	<th>Articulo</th>
	                            <th>Cantidad</th>
	                            <th>Valor de venta unitario</th>
                                <th>Valor de venta</th>
                                <th>Impuestos</th>
	                            <th>Precio Venta</th>
                            </tr>  
                        </thead>

                        <tbody>
                            <?php $sum = 0; ?>
                            @foreach($detalles as $det)
                            <?php $sum += ($det->precio_venta_unitario*$det->cantidad) + (0.18*($det->precio_venta_unitario*$det->cantidad)); ?>   
                            <tr>
                                <td>{{$det->producto->nombre}}</td>
                                <td>{{$det->cantidad}}</td>
                                <td>{{$det->precio_venta_unitario}}</td>
                                <td>{{$det->precio_venta_unitario*$det->cantidad}}</td>
                                <td>{{ 0.18*($det->precio_venta_unitario*$det->cantidad)}}</td>
                                <td>{{ ($det->precio_venta_unitario*$det->cantidad) + (0.18*($det->precio_venta_unitario*$det->cantidad)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                        		<th></th>
	                            <th></th>
	                            <th></th>
	                            <th></th>
                                <th><h4>Total</h4></th>
	                            <th><h4>{{$sum}}</h4></th>
                        	</tr> 
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
