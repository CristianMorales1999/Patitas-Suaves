<?php

    require_once '../../php/conexion_be.php';
    //$conexion = mysqli_connect("localhost","root","","bd_sitema_de_adopcion");
    
    //Verificar que la persona exista en la base de datos
    $consultaFechasUnicas="SELECT DISTINCT fechaDeRegistro FROM usuario ORDER BY fechaDeRegistro";
    $resultado = mysqli_query($conexion,$consultaFechasUnicas);

    //echo $consultaFechasUnicas;

    $fechasExistentes=[];
    $cantidades=[];

    if(mysqli_num_rows($resultado)>0){//Si la mascota ya existe
        
        while($fila=$resultado->fetch_assoc()){//Mientras hallan filas del resultado de la consulta
            $fechaActual=$fila['fechaDeRegistro'];//Obtengo la fecha actual del resultado
            array_push($fechasExistentes,$fechaActual);//Agrego la fecha actual al arreglo de fechas

            //Consulta sql para obtener cantidad de usuarios que registraron en la fecha actual
            $consultaCantidadUsuarios="SELECT COUNT(*) AS cantidad FROM usuario WHERE fechaDeRegistro='$fechaActual'";
            $resultadoActual=mysqli_query($conexion,$consultaCantidadUsuarios);//Resultado de la consulta
            //echo $consultaCantidadUsuarios;
            if(mysqli_num_rows($resultadoActual)>0){//Si hay filas en el resultado obtenido

                $fila=mysqli_fetch_assoc($resultadoActual);//Obtenemos la unica fila del resultado
                $cantidadActual=$fila['cantidad'];//Accedemos a la cantidad obtenida en la consulta para la fecha actual
                array_push($cantidades,$cantidadActual);//Agrego la cantidad actual al arreglo de cantidades
            }
            else{
                array_pop($fechasExistentes);//Si no hay usuario que se hallan registrado en la fecha actual
            }
        }
    }
    
    $datosX=json_encode($fechasExistentes);

    /*echo "Datos X: \n";
    echo "<pre>";
    print_r($fechasExistentes);
    echo "</pre>";*/
    
    
    $datosY=json_encode($cantidades);

    /*echo "Datos Y: \n";
    echo "<pre>";
    print_r($cantidades);
    echo "</pre>";*/
