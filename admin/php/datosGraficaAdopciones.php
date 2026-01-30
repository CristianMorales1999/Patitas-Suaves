<?php

    require_once '../../php/conexion_be.php';

    $meses1=[];
    $cantidades1=[];
    $meses2=[];
    $cantidades2=[];

    $consulta="SELECT MONTH(fechaDeRegistro) AS mes, COUNT(*) AS cantidad_adopciones FROM adopcion GROUP BY mes ORDER BY mes;";
    $resultado = mysqli_query($conexion,$consulta);
    
    if(mysqli_num_rows($resultado)>0){
        
        while($fila=$resultado->fetch_assoc()){
            
            $mesActual=$fila['mes'];
            $cantidadActual=$fila['cantidad_adopciones'];

            array_push($meses1,$mesActual);
            array_push($cantidades1,$cantidadActual);
        }
    }

    $consulta="SELECT MONTH(fechaDeConfirmacion) AS mes, COUNT(*) AS cantidad_adopciones FROM adopcion GROUP BY mes ORDER BY mes;";
    $resultado = mysqli_query($conexion,$consulta);
    
    if(mysqli_num_rows($resultado)>0){
        
        while($fila=$resultado->fetch_assoc()){
            
            $mesActual=$fila['mes'];
            $cantidadActual=$fila['cantidad_adopciones'];

            array_push($meses2,$mesActual);
            array_push($cantidades2,$cantidadActual);
        }
    }
    
    $months=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    for ($i = 0; $i < count($meses1); $i++) {
        $indice = $meses1[$i] - 1;
        if (isset($months[$indice])) {
            $meses1[$i] = $months[$indice];
        }//else {
        //     $meses1[$i] = "Mes inválido";
        // }
    }
    for ($i = 0; $i < count($meses2); $i++) {
        $indice = $meses2[$i] - 1;
        if (isset($months[$indice])) {
            $meses2[$i] = $months[$indice];
        }//else {
        //     $meses2[$i] = "Mes inválido";
        // } 
    }
    


    $datosX1=json_encode($meses1);
    $datosY1=json_encode($cantidades1);

    $datosX2=json_encode($meses2);
    $datosY2=json_encode($cantidades2);

    /*echo "Datos X: \n";
    echo "<pre>";
    print_r($meses1);
    echo "</pre>";*/
    
    /*echo "Datos Y: \n";
    echo "<pre>";
    print_r($cantidades);
    echo "</pre>";*/
?>