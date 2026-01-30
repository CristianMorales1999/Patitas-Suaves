<?php
session_start();
include 'conexion_be.php';

//Id del usuario
$idUsuario = $_SESSION[ 'id' ];
$usuarioActual = $_SESSION[ 'usuario' ];
$correoActual = $_SESSION[ 'correo' ];

//Datos del formulario
$contrasenaActual = $_POST[ 'password_actual'];
$contrasenaActual = hash( 'sha512', $contrasenaActual );

$nuevaContrasena = $_POST[ 'password_nuevo' ];
$nuevaContrasena = hash( 'sha512', $nuevaContrasena );

$nuevaContrasenaConfirmada = $_POST[ 'password_nuevo_confirmado' ];
$nuevaContrasenaConfirmada = hash( 'sha512', $nuevaContrasenaConfirmada );

//Validar Contraseña Actual
$consulta = "SELECT * FROM usuario WHERE correo='$correoActual' AND usuario='$usuarioActual' AND user_password='$contrasenaActual'";
$resultado = mysqli_query( $conexion, $consulta );

if ( mysqli_num_rows( $resultado ) == 0 ) {
    //Si el correo del usuario actual y la contraseña actual no coincides
    echo '<br><br><br><br><br><br>
                <script>
                    alert("Contraseña Incorrecta!");
                    window.location = "../cambiar-password.php";
                </script>
            ';
    exit();
}

if ( $nuevaContrasena == $nuevaContrasenaConfirmada ) {
    //Si la confirmacion de contraseña es correcta
    //Actualizamos la tabla usuario con los nuevos datos
    $consulta = "UPDATE usuario SET user_password='$nuevaContrasena' WHERE correo='$correoActual' AND usuario='$usuarioActual' AND user_password='$contrasenaActual'";

    $resultado = mysqli_query( $conexion, $consulta );

    if ( $resultado ) {
        //Si se obtuvo un resultado de la actualizacion
        $filas_afectadas = mysqli_affected_rows( $conexion );
        //Verifico cantidad de filas afectadas
        if ($filas_afectadas == 0) {
            echo '
                    <script>
                        alert("Lo sentimos al parecer no se realizaron cambios para el Usuario.");
                        window.location = "../cambiar-password.php";
                    </script>
                ';
            exit();
        }
    } else {
        echo '
                <script>
                    alert("Lo sentimos al parecer no se pudo realizar correctamente la Actualizacion de la contraseña del Usuario.");
                    window.location = "../cambiar-password.php";
                </script>
            ';
        exit();
    }

    //Actualizamos las variables de Sesion Actual
    $_SESSION[ 'password' ] = $nuevaContrasena;

    //Agregado por cambiar password

    echo '
            <script>
                alert("Cambios realizados exitosamente!");
                window.location = "../ver-perfil.php";
            </script>
        ';
    exit();

} else {
    //Confirmacion de contraseña incorrecta
    echo '
        <script>
            alert("Confirmación de contraseña Incorrecta!");
            window.location = "../cambiar-password.php";
        </script>
        ';
    exit();
}
?>
