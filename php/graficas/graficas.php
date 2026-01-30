<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta name="theme-color" content="#6A205F">
    <meta name="twitter:card" content="summary">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style-index.css">


    <title>Graficas y Estadisticas</title>

    <!--Plotly-->
    <script src="https://cdn.plot.ly/plotly-2.24.1.min.js" charset="utf-8"></script>

    <!--Bootstrap no esta funcionando bien-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>-->

    <!--Bootstrap con libreria descargada-->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <!--Aqui puedo agregar cualquier cosa antes de los graficos-->
                <br><br>

                <!--A partir de aqui ya empieza toda la seccion de graficos-->
                <div class="panel panel-primary">
                    

                    <div class="panel panel-heading">
                        Graficas con Plotly js
                    </div>

                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="cargaLineal"></div><!--Este id usa java script-->

                            </div>

                            <div class="col-sm-6">
                                <div id="cargaBarras"></div><!--Este id usa java script-->
                            </div>
                        </div>
                    </div>

                </div>
                <!--Aqui termina toda la seccion de graficos-->
                
            </div>
        </div>
    </div>
    <script src="graficas.js"></script>
</body>

</html>