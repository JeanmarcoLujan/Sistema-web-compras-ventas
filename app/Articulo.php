<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $tabla= 'articulos';

    protected $primaryKey = 'idarticulo';

    public $timestamps=false;

    protected $fillable=[
    	'idcategoria',
        'unit_id',
    	'codigo',
    	'nombre',
        'stock_minimo',
    	'stock',
    	'descripcion',
    	'imagen',
    	'estado'


    ];

    protected $guarded=[

    ];


    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','idcategoria');
    }



}