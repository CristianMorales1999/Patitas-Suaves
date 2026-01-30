<?php

session_start();

include 'conexion_be.php';

$correo = $_POST[ 'correo' ];
$contrasena = $_POST[ 'contrasena' ];
$contrasena = hash( 'sha512', $contrasena );

$verificar_login = mysqli_query( $conexion, "SELECT * FROM usuario WHERE correo='$correo' and user_password='$contrasena'" );

if ( mysqli_num_rows( $verificar_login ) > 0 ) {
    //Si existe el usuario en la base de datos
    $_SESSION[ 'correo' ] = $correo;

    $fila=mysqli_fetch_assoc($verificar_login);
    $_SESSION['nombre']=$fila['nombre'];
    $_SESSION['apellidos']=$fila['apellidos'];
    $_SESSION['id']=$fila['id'];
    $_SESSION['rol']=$fila['rol'];

    //Agregado por ver perfil
    $_SESSION['usuario']=$fila['usuario'];//
    $_SESSION['password']=$contrasena;//Agregado por cambiar contraseña
    $_SESSION['celular']="";
    $_SESSION['sexo']="";
    $_SESSION['url']=null;
    if($fila['celular']!=null){
        $_SESSION['celular']=$fila['celular'];//
    }
    if($fila['sexo']!=null){
        if($fila['sexo']=="1"){
            $_SESSION['sexo']="Hombre";//
        }else if($fila['sexo']=="0"){
            $_SESSION['sexo']="Mujer";//
        }
    }
    //Obtener url de imagen de usuario
    $consulta = "SELECT Usuario_id, url FROM imagen WHERE Usuario_id='". $_SESSION['id'] . "'";
    $resultado = mysqli_query($conexion,$consulta);
    if ( mysqli_num_rows( $resultado ) > 0 ) {
        $fila=mysqli_fetch_assoc($resultado);
        $_SESSION['url']=$fila['url'];
    }


    mysqli_close( $conexion );

    if($_SESSION['rol']=="1"){
        header( 'location: ../admin/php/page.php' );
    }else{
        header( 'location: ../index.php' );
    }

    exit();
} else {
    echo '
            <script>
                alert("Usuario no existe,por favor verifique los datos introducidos");
                window.location = "../login.php";
            </script>
        ';
    exit();
}
?>