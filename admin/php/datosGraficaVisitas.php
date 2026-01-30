<?php

    require_once '../../php/conexion_be.php';
    
    //Verificar que la persona exista en la base de datos
    $consulta="SELECT fecha, COUNT(DISTINCT IP_id) AS cantidad_ips_distintas FROM visita GROUP BY fecha ORDER BY fecha;";
    $resultado = mysqli_query($conexion,$consulta);

    //echo $consultaFechasUnicas;

    $fechasExistentes=[];
    $cantidades=[];

    if(mysqli_num_rows($resultado)>0){//Si la mascota ya existe
        
        while($fila=$resultado->fetch_assoc()){//Mientras hallan filas del resultado de la consulta
            
            $fechaActual=$fila['fecha'];//Obtengo la fecha actual del resultado
            $cantidadActual=$fila['cantidad_ips_distintas'];

            array_push($fechasExistentes,$fechaActual);//Agrego la fecha actual al arreglo de fechas
            array_push($cantidades,$cantidadActual);
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
?>