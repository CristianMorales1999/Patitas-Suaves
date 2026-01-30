<?php
require_once 'conexion_be.php';

$visitasRegistradas=[];

    //Obtenemos todos los usuarios activos de la base de datos
    $consulta = "SELECT * FROM visita";
    $resultado = mysqli_query( $conexion, $consulta );

    if ( mysqli_num_rows( $resultado )>0 ) {
        while($fila=$resultado->fetch_assoc()){//Mientras hallan mascotas
            array_push($visitasRegistradas,$fila);//Agrego la mascota disponible al arreglo de mascotas
        }
    }
    //else {
    //     echo '
    //         <script>
    //             alert("Lo sentimos al parecer no se cuenta con ningún usuario Activo actualmente.");
    //             window.location = "../index.php";
    //         </script>
    //     ';
    //     exit();
    // }

/*
echo "Datos X: \n";
    echo "<pre>";
    print_r($usuariosActivos);
echo "</pre>";
*/

?>