<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $tabla= 'ventas';

    protected $primaryKey = 'idventa';

    public $timestamps=false;

    protected $fillable=[
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'estado'

    ];

    protected $guarded=[

    ];


    public function cliente()
    {
        return $this->belongsTo('App\Persona','idcliente');
    }

}
