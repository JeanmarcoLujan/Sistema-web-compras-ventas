<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $tabla= 'detalle_ingresos';

    protected $primaryKey = 'iddetalle_ingreso';

    public $timestamps=false;

    protected $fillable=[
    	'idingreso',
    	'idarticulo',
    	'cantidad',
    	'precio_venta_unitario',
    ];

    protected $guarded=[

    ];

    public function producto()
    {
        return $this->belongsTo('App\Articulo','idarticulo');
    }
}
