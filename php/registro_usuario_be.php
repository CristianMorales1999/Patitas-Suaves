<?php

    include 'conexion_be.php';    

    $nombre = $_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    //Encriptamiento de contraseña
    $contrasena = hash('sha512', $contrasena);
    date_default_timezone_set('America/Lima');
    $fechaDeRegistro=date("Y-m-d");


    //Verificacion de tabla estado usuario
    $estadoUsuario="Activo";
    $idEstadoUsuario=-1;

    $consultaEstadoUsuario= mysqli_query($conexion, "SELECT * FROM estadousuario WHERE estado='$estadoUsuario'");

    if(mysqli_num_rows($consultaEstadoUsuario)==0){//Si no existe el estadoUsuario "Activo"
        $insercionEstadoUsuario= mysqli_query($conexion, "INSERT INTO estadousuario(estado) VALUES('$estadoUsuario')");

        if($insercionEstadoUsuario){//Si se inserto correctamente el nuevo estadoUsuario "Activo"
            $consultaEstadoUsuario= mysqli_query($conexion, "SELECT id FROM estadousuario WHERE estado='$estadoUsuario'");
            $fila=mysqli_fetch_assoc($consultaEstadoUsuario);
            $idEstadoUsuario=$fila['id'];
        }
        else{//Si NO se inserto correctamente el nuevo estadoUsuario "Activo"
            echo '
            <script>
                alert("Lo sentimos el estado del Usuario no se pudo registrar.");
                window.location = "../login.php";
            </script>
            ';
            exit();
        }
    }
    else{//Si existe el estadoUsuario "Activo"
        $fila=mysqli_fetch_assoc($consultaEstadoUsuario);
        $idEstadoUsuario=$fila['id'];
    }

    $rol=0;
    $query = "INSERT INTO usuario(EstadoUsuario_id,nombre,apellidos,correo,usuario,user_password,rol,fechaDeRegistro)
              VALUES('$idEstadoUsuario','$nombre','$apellidos', '$correo', '$usuario', '$contrasena', '$rol','$fechaDeRegistro')";
    
    //Verificar que el correo no se repita en la base de datos

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){//Si ya existe un usuario con ese correo
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }

    //Verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){//Si ya existe un usuario con ese usuario
        echo '
            <script>
                alert("Este usuario ya está registrado, intenta con otro diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
    
    $ejecutar = mysqli_query($conexion, $query);//Consulta de insercion del nuevo usuario ya validado

    if($ejecutar){//Si se inserta correctamente el usuario

        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario' AND correo='$correo'");

        $fila=mysqli_fetch_assoc($consulta);
        
        session_start();
        $_SESSION['id']=$fila['id'];
        $_SESSION['nombre']=$fila['nombre'];
        $_SESSION['apellidos']=$fila['apellidos'];
        $_SESSION[ 'correo' ] = $fila['correo'];
        $_SESSION['rol']=$fila['rol'];

        //Agregado por ver perfil
        $_SESSION['usuario']=$fila['usuario'];//
        $_SESSION['password']=$contrasena;//Agregado por cambiar contraseña
        $_SESSION['celular']="";
        $_SESSION['sexo']="";
        $_SESSION['url']=null;

        mysqli_close( $conexion);

        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Inténtelo de nuevo, usuario no almacenado");
                window.location = "../index.php";
            </script>
        ';
    }
    mysqli_close($conexion);
?>