$(document).ready(function () {
    cambiar_fecha_grafica();
});

function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();
    var seleccion = $("#seleccion").val();
    cargar_grafica_barras(anio_sel,mes_sel,seleccion);
    
}


function cargar_grafica_barras(anio,mes,selec){

var options={
	 chart: {
	 	    renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes'
        },
        subtitle: {
            text: 'Source: plusis.net'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'registros',
            data: []

        }]
}

if (selec=='1') {
    var url = "grafica_registros_ventas/"+anio+"/"+mes+"";
}else{
    var url = "grafica_registros_compras/"+anio+"/"+mes+"";
};



$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
	for(i=1;i<=totaldias;i++){
	
	options.series[0].data.push( registrosdia[i] );
	options.xAxis.categories.push(i);


	}


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}



