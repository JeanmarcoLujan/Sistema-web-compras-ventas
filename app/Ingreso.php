<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $tabla= 'ingresos';

    protected $primaryKey = 'idingreso';

    public $timestamps=false;

    protected $fillable=[
    	'idproveedor',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'estado'

    ];

    protected $guarded=[

    ];

    public function proveedor()
    {
        return $this->belongsTo('App\Persona','idproveedor');
    }
}
