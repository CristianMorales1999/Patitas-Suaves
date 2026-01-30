<?php require_once 'datosGraficaUsuarios.php';
//echo "Datos XX: ".$datosX;
?>

<div id="graficaLineal"></div>


<script>
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
    var datosX = crearCadenaLineal('<?php echo $datosX; ?>');
    var datosY = crearCadenaLineal('<?php echo $datosY; ?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: {
            color: 'red',
            width: 2
        },
        marker: {
            color: 'rgb(255, 0, 0)',
            size: 12
        }
    };
    var layout = {
        title: {
            text: 'Registro de usuarios',
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

    Plotly.newPlot('graficaLineal', data,layout);
</script>