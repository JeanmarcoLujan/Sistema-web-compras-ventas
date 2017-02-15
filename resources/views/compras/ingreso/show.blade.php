@extends ('layouts.app')
@section ('contenido')
	

    <div class="container">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
            	<h4><label >Proveedor</label></h4>
                <p>{{$ingreso->proveedor->nombre}}</p>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<h4><label >Tipo Comprobante</label></h4>
                <p>{{$ingreso->tipo_comprobante}}</p>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<h4><label for="serie_comprobante">Serie Comprobante</label></h4>
            	<p>{{$ingreso->serie_comprobante}}</p>
            </div>
    	</div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <h4><label for="num_comprobante">Numero Comprobante</label></h4>
                <p>{{$ingreso->num_comprobante}}</p>            
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panle-primary">
            <div class="panel-body">          
                <?php $sum = 0; ?>
                @foreach($detalles as $det)
                    <?php $sum += ($det->precio_venta_unitario*$det->cantidad) + (0.18*($det->precio_venta_unitario*$det->cantidad)); ?>         
                @endforeach                
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            
                            <th><h4><label>Articulo</label></h4></th>
                            <th><h4><label>Cantidad</label></h4></th>
                            <th><h4><label>Valor venta unitario</label></h4></th>
                            <th><h4><label>Valor de venta</label></h4></th>
                            <th><h4><label>Impuesto</label></h4></th>
                            <th><h4><label>Precio Venta</label></h4></th>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4><label>Total</label></h4></th>
                            <th><h4 id="total">{{ $sum }}</h4></th>
                            
                        </tfoot>
                        <tbody>
                            @foreach($detalles as $det)

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
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection