<?php 
    require_once 'datosGraficaAdopciones.php';
?>

<div id="graficaLinealAdopciones"></div>


<script>
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
    var datosX1 = crearCadenaLineal('<?php echo $datosX1; ?>');
    var datosY1 = crearCadenaLineal('<?php echo $datosY1; ?>');

    var datosX2 = crearCadenaLineal('<?php echo $datosX2; ?>');
    var datosY2 = crearCadenaLineal('<?php echo $datosY2; ?>');

    var trace1 = {
        x: datosX1,
        y: datosY1,
        type: 'bar',
        name: 'Solicitudes de Adopciones',
        marker: {
            color: 'rgb(255,206,86)',
            opacity: 0.7,
        }
    };
    var trace2 = {
        x: datosX2,
        y: datosY2,
        type: 'bar',
        name: 'Adopciones Realizadas',
        marker: {
            color: 'rgb(255,99,132)',
            opacity: 0.5
        }
    };


    var layout = {
        title: {
            text: 'Registro de Adopciones',
            font: {
                family: 'Arial, sans-serif',
                size: 18,
                weight: 'bold'
            }
        },
        xaxis: {
            title: {
                text: 'Meses del Año',
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    weight: 'bold'
                }
            },
            tickangle: -45,//Esto agregué
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: {
                text: 'Cantidad de Adopciones',
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    weight: 'bold'
                }
            },
            showline: false
        },
        barmode: 'group'
    };
    var data = [trace1, trace2];

    Plotly.newPlot('graficaLinealAdopciones', data, layout);
</script>