@extends ('layouts.app')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

	{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
            	<label >Proveedor</label>
                <select id="idproveedor" name="idproveedor" class="form-control selectpicker" data-live-search="true">
                    @foreach($personas as $persona)
                        <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                    @endforeach
                </select>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label >Tipo Comprobante</label>
                <select name="tipo_comprobante" class="form-control">
                    <option value="Boleta">Boleta</option>
                    <option value="Factura">Factura</option>
                   
                </select>
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label for="serie_comprobante">Serie Comprobante</label>
            	<input type="text" name="serie_comprobante" required value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie del comprobante">
            </div>
    	</div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero del comprobante">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panle-primary">
            <div class="panel-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label>Articulo</label>
                        <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                            @foreach ($articulos as $articulo)
                                <option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="precio_compra">Valor de venta unitario</label>
                        <input type="number" name="pprecion_venta_unitario" id="pprecion_venta_unitario" class="form-control" placeholder="P. venta unitario">
                    </div>
                </div>
                

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Valor de venta unitario</th>
                            <th>Valor de venta </th>
                            <th>IGV</th>
                            <th>Precio de venta</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">S/. 0.00</h4></th>
                            
                        </tfoot>
                        <tbody> </tbody>
                        
                    </table>
                </div>

            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
    		<div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>


    </div>
	{!!Form::close()!!}	


@push('scripts')
<script >
    $(document).ready(function () {
        $('#bt_add').click(function(){
            agregar();
        });
    });
    total=0;
    var cont=0;
    subtotal=[];
    igv=0.18;
    impuesto=0;
    precio_total = 0;
    precio_venta=0;
    $('#guardar').hide();
    function agregar () {
        idarticulo=$('#pidarticulo').val();
        articulo=$('#pidarticulo option:selected').text();
        cantidad=$('#pcantidad').val();
        precio_venta_unitario=$('#pprecion_venta_unitario').val();
        

        if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_venta_unitario!="") {
            precio_total=(cantidad*precio_venta_unitario);
            impuesto = (igv*precio_total);
            precio_venta = precio_total + impuesto;
            subtotal[cont] = precio_venta;
            total=total+subtotal[cont];

            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number"  name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta_unitario[]" value="'+precio_venta_unitario+'"></td></td><td>'+precio_total+'</td><td>'+impuesto+'</td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $('#total').html("S/. "+ total);
            evaluar();
            $('#detalles').append(fila);
        }else{
            alert("Error al ingresar el detalle del ingreso, revise los satos del articulo");
        }
    }


    function limpiar () {
        $('#pcantidad').val("");
        $('#pprecion_venta_unitario').val("");
       
    }

    function evaluar () {
        if (total>0) {
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        }
    }

    function eliminar (index) {
        total=total-subtotal[index];
        $("#total").html("S/. "+ total);
        $("#fila" + index).remove();
        evaluar();
    }
</script>

@endpush            
@endsection