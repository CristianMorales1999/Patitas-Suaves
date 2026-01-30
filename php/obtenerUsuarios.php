<?php
require_once 'conexion_be.php';

$usuariosActivos=[];

//Verificar que exista el estado activo en la tabla EstadoUsuario
$consulta = "SELECT * FROM estadousuario WHERE estado='Activo'";
$resultado = mysqli_query( $conexion, $consulta );

if ( mysqli_num_rows( $resultado )>0 ) {
    //Si existe el estado activo
    $fila = mysqli_fetch_assoc( $resultado );
    $idEstadoUsuario = $fila[ 'id' ];

    //Obtenemos todos los usuarios activos de la base de datos
    $consulta = "SELECT * FROM usuario WHERE EstadoUsuario_id='$idEstadoUsuario'";
    $resultado = mysqli_query( $conexion, $consulta );

    if ( mysqli_num_rows( $resultado )>0 ) {
        //Si existe usuarios con estado Activo

        while($fila=$resultado->fetch_assoc()){//Mientras hallan mascotas
            array_push($usuariosActivos,$fila);//Agrego la mascota disponible al arreglo de mascotas
        }

    } else {
        echo '
            <script>
                alert("Lo sentimos al parecer no se cuenta con ningún usuario Activo actualmente.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }
} else {
    echo '
            <script>
                alert("Lo sentimos al parecer no existe un estado de Usuario Activo.");
                window.location = "../adoptar.php";
            </script>
        ';
    exit();
}
?>