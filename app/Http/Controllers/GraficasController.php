<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Venta;
use App\Ingreso;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }



    public function registros_mes_ventas($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $ventas=Venta::whereBetween('fecha_hora', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($ventas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($ventas as $venta){
        $diasel=intval(date("d",strtotime($venta->fecha_hora) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }


    


    public function grafico_ventas()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("reportes.listado_graficas_ventas")
               ->with("anio",$anio)
               ->with("mes",$mes);
    }

    public function registros_mes_compras($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $compras=Ingreso::whereBetween('fecha_hora', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($compras);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($compras as $compra){
        $diasel=intval(date("d",strtotime($compra->fecha_hora) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }


    


    public function grafico_compras()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("reportes.listado_graficas_compras")
               ->with("anio",$anio)
               ->with("mes",$mes);
    }

}
