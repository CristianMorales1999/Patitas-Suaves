<?php
    include 'conexion_be.php';
    require_once 'obtenerMascotas.php'; 

    $index=$_GET['indice'];//El parametro que le pasa adoptar.php en el bucle for
    $ip = $_GET['ip'];
    $idMascota=$mascotasDisponibles[$index]['id'];
    date_default_timezone_set('America/Lima');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

    $idIP=-1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM ip WHERE ip='$ip'" );
    //Busco obtener el id del usuario que esta en sesion ahora

    if ( mysqli_num_rows( $consulta )>0 ) {//Si ya existe el IP en la BD
        $fila = mysqli_fetch_assoc( $consulta );
        $idIP = $fila[ 'id' ];
    }
    else{//Si NO existe el IP en la BD
        $insercion= mysqli_query($conexion, "INSERT INTO ip(ip) VALUES('$ip')");

        if($insercion){//Si se inserto correctamente el nuevo "IP"
            $consulta= mysqli_query($conexion, "SELECT id FROM ip WHERE ip='$ip'");
            $fila=mysqli_fetch_assoc($consulta);
            $idIP=$fila['id'];
            //echo '<script>alert("Nuevo IP registrado Exitosamente!");</script>';
        }
        else{//Si NO se inserto correctamente el nuevo EstadoImagen "Activa"
            echo '
            <script>
                alert("Lo sentimos el IP no se pudo registrar.");
                window.location = "../adoptar.php";
            </script>
            ';
            mysqli_close( $conexion );
            exit();
        }
    }

    $consulta = mysqli_query( $conexion, "SELECT * FROM mascota WHERE id='$idMascota'" );

    if ( mysqli_num_rows( $consulta )>0) {//Si existe la mascota en la BD

        $insercion= mysqli_query($conexion, "INSERT INTO visita(Mascota_id,IP_id,fecha,hora) VALUES('$idMascota','$idIP','$fecha','$hora')");

        if($insercion){//Si se inserto correctamente el nuevo "IP"
            echo '<script>';
            //echo 'alert("Nuevo Visita registrado Exitosamente!");';
            echo 'window.location = "../mascota.php?indice=' . $index . '";';
            echo '</script>';
        }
        else{
            echo '<script>';
            echo 'alert("Lo sentimos, algo salió mal en la inserción de la nueva visita!");';
            echo 'window.location = "../mascota.php?indice=' . $index . '";';
            echo '</script>';
        }
    }
    else{
        echo '
            <script>
                alert("Lo sentimos no existe mascota con el ID proporcionado.");
                window.location = "../adoptar.php";
            </script>
        ';
    }
    mysqli_close( $conexion );
    exit();
?>
