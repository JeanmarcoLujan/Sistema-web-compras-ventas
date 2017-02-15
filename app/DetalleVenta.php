<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $tabla= 'detalle_ventas';

    protected $primaryKey = 'iddetalle_venta';

    public $timestamps=false;

    protected $fillable=[
    	'idventa',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento'

    ];

    protected $guarded=[

    ];

    
    public function producto()
    {
        return $this->belongsTo('App\Articulo','idarticulo');
    }
}
