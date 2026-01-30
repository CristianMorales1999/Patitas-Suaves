<?php
require_once 'conexion_be.php';

//Verificar que la persona exista en la base de datos
$consulta = "SELECT * FROM mascota ORDER BY nombre";
$resultado = mysqli_query($conexion, $consulta);


$mascotasDisponibles = [];
$imagenesMascotas = [];

if (mysqli_num_rows($resultado) > 0) { //Si hay mascotas

    while ($fila = $resultado->fetch_assoc()) { //Mientras hallan mascotas
        if ($fila['disponibilidad']) {           
            
            // 0-6 meses
            // 6-12 meses
            // 1 a 5 años
            // 5 años a más
            // ---------------------------------------------------------------------------
            $edad = '';
            $fechaNacimiento = $fila['fechaDeNacimiento'];
            $fechaActual = date("Y-m-d");
            $diff = date_diff(date_create($fechaNacimiento), date_create($fechaActual));
            $anios = $diff->y;
            $meses = $diff->m;
            $dias = $diff->d;

            if ($anios == 0 and $meses < 6 ) {
                $edad = "1";    
            }elseif($anios == 0 and $meses < 12){
                $edad = "2";
            }elseif($anios > 0  and $anios < 5){
                $edad = "3";
            }else{
                $edad = "4";
            }           
            $fila['edad'] = $edad;
            //------------------------------------------------------------------------------

            array_push($mascotasDisponibles, $fila); //Agrego la mascota disponible al arreglo de mascotas
        }
    }
}



for ($i = 0; $i < count($mascotasDisponibles); $i++) {
    $consulta = "SELECT Mascota_id, url FROM imagen WHERE Mascota_id='" . $mascotasDisponibles[$i]['id'] . "'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $mascotasDisponibles[$i]['url'] = $fila['url'];
    }

    //Historial Clinico
    $consultaAlergias = "SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_alergia WHERE Mascota_id='" . $mascotasDisponibles[$i]['id'] . "'";
    $consultaEnfermedades = "SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_enfermedad WHERE Mascota_id='" . $mascotasDisponibles[$i]['id'] . "'";
    $consultaVacunas = "SELECT COUNT(Mascota_id) AS 'cantidad' FROM mascota_has_vacuna WHERE Mascota_id='" . $mascotasDisponibles[$i]['id'] . "'";

    $resultadoAlergias = mysqli_query($conexion, $consultaAlergias);
    $resultadoEnfermedades = mysqli_query($conexion, $consultaEnfermedades);
    $resultadoVacunas = mysqli_query($conexion, $consultaVacunas);

    $nAlergias = 0;
    $nEnfermedades = 0;
    $nVacunas = 0;

    if (mysqli_num_rows($resultadoAlergias) > 0) {
        $fila = mysqli_fetch_assoc($resultadoAlergias);
        $nAlergias = $fila['cantidad'];
    }
    if (mysqli_num_rows($resultadoEnfermedades) > 0) {
        $fila = mysqli_fetch_assoc($resultadoEnfermedades);
        $nEnfermedades = $fila['cantidad'];
    }
    if (mysqli_num_rows($resultadoVacunas) > 0) {
        $fila = mysqli_fetch_assoc($resultadoVacunas);
        $nVacunas = $fila['cantidad'];
    }

    if ($nAlergias > 0 || $nEnfermedades > 0 || $nVacunas > 0) {
        $mascotasDisponibles[$i]['historialClinico'] = "Si";
    } else {
        $mascotasDisponibles[$i]['historialClinico'] = "No";
    }
}

/*for($i=0; $i<count($mascotasDisponibles); $i++){
    echo "<br><br>MASCOTA ".$i.": <br>";
    foreach ($mascotasDisponibles[$i] as $clave => $valor) {

        if($mascotasDisponibles[$i][$clave]==null){
            echo "<br>".$clave."<br>";
        }
        echo "Mascota[".$i."][". $clave ."] (Tipo ".gettype($valor)."): " . $valor . "<br>";
      }
}*/
?>