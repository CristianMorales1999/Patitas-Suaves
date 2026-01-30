<?php
    session_start();
    require_once 'conexion_be.php';
    $idMascota = $_GET['indice'];
    //Verificar que la persona exista en la base de datos
    $consulta="SELECT * FROM mascota WHERE id='$idMascota' ";
    $resultado = mysqli_query($conexion,$consulta);

    $mascotaActual=[];

    if(mysqli_num_rows($resultado)>0){//Si hay mascotas
        
        $mascotaActual = mysqli_fetch_assoc( $resultado );
    

        $consulta = "SELECT Mascota_id, url FROM imagen WHERE Mascota_id='" . $mascotaActual['id'] . "'";

        $resultado = mysqli_query($conexion,$consulta);
        
        if(mysqli_num_rows($resultado)>0){
            $fila=mysqli_fetch_assoc($resultado);
            $mascotaActual['url']=$fila['url'];
        }

        //Historial Clinico
        $consultaAlergias ="SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_alergia WHERE Mascota_id='" . $mascotaActual['id'] . "'";
        $consultaEnfermedades ="SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_enfermedad WHERE Mascota_id='" . $mascotaActual['id'] . "'";
        $consultaVacunas ="SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_vacuna WHERE Mascota_id='" . $mascotaActual['id'] . "'";

        $resultadoAlergias =mysqli_query($conexion,$consultaAlergias);
        $resultadoEnfermedades =mysqli_query($conexion,$consultaEnfermedades);
        $resultadoVacunas =mysqli_query($conexion,$consultaVacunas);
        
        $nAlergias=0;
        $nEnfermedades=0;
        $nVacunas=0;

        if(mysqli_num_rows($resultadoAlergias)>0){
            $fila=mysqli_fetch_assoc($resultadoAlergias);
            $nAlergias=$fila['cantidad'];
        }
        if(mysqli_num_rows($resultadoEnfermedades)>0){
            $fila=mysqli_fetch_assoc($resultadoEnfermedades);
            $nEnfermedades=$fila['cantidad'];
        }
        if(mysqli_num_rows($resultadoVacunas)>0){
            $fila=mysqli_fetch_assoc($resultadoVacunas);
            $nVacunas=$fila['cantidad'];
        }

        if($nAlergias>0 || $nEnfermedades>0 || $nVacunas>0 ){
            $mascotaActual['historialClinico']="Si";
        }
        else{
            $mascotaActual['historialClinico']="No";
        }

        mysqli_close($conexion);
        // $mascotaActualSeleccionada = urlencode(serialize($mascotaActual));

        $_SESSION['mascotaActual'] = $mascotaActual;

        echo '<script>';
        echo 'window.location = "../admin/php/info-mas.php"';
        echo '</script>';
        exit();
    }
?>  