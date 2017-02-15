@extends ('layouts.app')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Venta</h3>
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

	{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
            	<label >Cliente</label>
                <select id="idcliente" name="idcliente" class="form-control selectpicker" data-live-search="true">
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
                            <option disabled selected>Seleccionar producto</option>
                            @foreach ($articulos as $articulo)
                                <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_unitario}}">{{$articulo->articulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" disabled="true" name="pstock" id="pstock" class="form-control" placeholder="Stock">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta">Precio Venta</label>
                        <input type="number" disabled="true" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. Venta">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="descuento">Descuento</label>
                        <input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Valor de venta unit.</th>
                            <th>Valor de venta</th>
                            <th>Impuesto.</th>
                            <th>Descuento</th>
                            <th>Precio venta</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                            
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
    impuesto = 0;
    valor_venta=0;
    $('#guardar').hide();
    $('#pidarticulo').change(mostrarValores);

    function mostrarValores () {
        precio_unit=0;
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        precio_unit = 1.15 *(datosArticulo[2]);
        $("#pprecio_venta").val(precio_unit);
        $("#pstock").val(datosArticulo[1]);
    }


    function agregar () {

        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        idarticulo = datosArticulo[0];

        articulo=$('#pidarticulo option:selected').text();
        cantidad=$('#pcantidad').val();
        descuento=$('#pdescuento').val();
        precio_venta=$('#pprecio_venta').val();
        impuesto = 0.18*(precio_venta*cantidad);
        valor_venta = precio_venta*cantidad;
        stock=$('#pstock').val();
        if (descuento == "") {
            descuento = 0;
        };


        if (idarticulo!=""  ) {
            if (stock>=cantidad) {
                subtotal[cont]=(cantidad*precio_venta + impuesto - descuento);
                total=total+subtotal[cont];
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+valor_venta+'</td><td>'+impuesto+'</td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $('#total').html("S/. "+ total);
                $('#total_venta').val(total);
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("La cantidad a vender supera el stock");
            }
            

            
        }else{
            alert("Error al ingresar el detalle de la venta, revise los datos del articulo");
        }
    }


    function limpiar () {
        $('#pcantidad').val("");
        $('#pdescuento').val("");
        $('#pprecio_venta').val("");
        $('#pstock').val("");
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
        $("#total_venta").val(total);
        $("#fila" + index).remove();
        evaluar();
    }
</script>

@endpush            
@endsection