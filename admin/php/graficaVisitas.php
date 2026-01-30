<?php require_once 'datosGraficaVisitas.php';
//echo "Datos XX: ".$datosX;
?>

<div id="graficaVisitas"></div>


<script>
    function crearCadenaVisitas(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
    var datosX = crearCadenaVisitas('<?php echo $datosX; ?>');
    var datosY = crearCadenaVisitas('<?php echo $datosY; ?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: {
            color: 'rgb(153, 102, 255)',
            width: 8
        },
        marker: {
            color: 'rgb(153, 102, 255)',
            size: 12
        }
    };
    var layout = {
        title: {
            text: 'Registro de Visitas',
            font: {
                family: 'Arial, sans-serif',
                size: 18,
                weight: 'bold'
            }
        },
        xaxis: {
            title: {
                text: 'Fechas de Visita',
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    weight: 'bold'
                }
            },
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: {
                text: 'Cantidad de Usuarios',
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    weight: 'bold'
                }
            },
            showline: false
        }
    };
    var data = [trace1];

    Plotly.newPlot('graficaVisitas', data,layout);
</script>