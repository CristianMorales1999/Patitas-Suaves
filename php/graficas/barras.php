<?php require_once 'datosGraficaMascotas.php'; ?>


<div id="graficaBarras"></div>
<script>
    function crearCadenaBarras(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }

    var datosX = crearCadenaBarras('<?php echo $datosX ?>');
    var datosY = crearCadenaBarras('<?php echo $datosY ?>');

    var data = [{
        x: datosX,
        y: datosY,
        type: 'bar',
        size: 12,
        line: {
            color: 'red',
            width: 2
        },
        marker: {
            color: 'rgb(0, 0, 255)',
            size: 12
        }
    }];
    var layout = {
        title: {
            text: 'Registro de Mascotas',
            font: {
                family: 'Arial, sans-serif',
                size: 18,
                weight: 'bold'
            }
        },
        xaxis: {
            title: {
                text: 'Fechas de Registro',
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
                text: 'Cantidad de Mascotas',
                font: {
                    family: 'Arial, sans-serif',
                    size: 16,
                    weight: 'bold'
                }
            },
            showline: false
        }
    };

    Plotly.newPlot('graficaBarras', data, layout);
</script>