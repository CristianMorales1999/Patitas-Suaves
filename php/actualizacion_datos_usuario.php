<?php
    session_start();
    include 'conexion_be.php';

    //Id del usuario
    $idUsuario = $_SESSION[ 'id' ];
    $correoActual = $_SESSION[ 'correo' ];
    $usuarioActual = $_SESSION[ 'usuario' ];

    $nuevoNombre = $_POST[ 'nombre' ];
    //nuevo nombre
    $nuevoApellidos = $_POST[ 'apellidos' ];
    //nuevos apellidos
    $nuevoUsuario = $_POST[ 'usuario' ];
    //nuevo usuario
    $nuevoCorreo = $_POST[ 'correo' ];
    //nuevo correo
    $nuevoTelefono = $_POST[ 'telefono' ];
    //nuevo telefono
    $nuevoSexo = $_POST[ 'sexo' ];
    //nuevo sexo

    $nuevoSexoAAgregar = '';
    if ( $nuevoSexo == 'Hombre' ) {
        $nuevoSexoAAgregar = '1';
        //Variable convertidas a int para guardar en la BD
    } else if ( $nuevoSexo == 'Mujer' ) {
        $nuevoSexoAAgregar = '0';
        //Variable convertidas a int para guardar en la BD
    }

    $imagenUsuario = $_FILES[ 'foto' ];
    //Imagen de mascota
    $nombreImagen = $imagenUsuario[ 'name' ];
    //Nombre de la imagen
    $rutaDeImagen = $imagenUsuario[ 'tmp_name' ];
    //Ruta temporar de servidor donde esta la imagen subida

    $directorioDestino = 'imagenesUsuariosRegistrados';
    //Carpeta donde voy a guardar las imagenes se vallan registrarndo en la bd
    $nombreUnico = uniqid().'_'.$nombreImagen;
    //Generamos un nombre unico para cada imagen que se suba
    $rutaFinalDeImagen = $directorioDestino.'/'.$nombreUnico;
    //Ruta donde se va a guardar la imagen

    //Validar Correo
    $consulta = "SELECT * FROM usuario WHERE correo='$nuevoCorreo' AND correo!='$correoActual'";
    $resultado = mysqli_query( $conexion, $consulta );

    if ( mysqli_num_rows( $resultado )>0 ) {
        //Si ya hay una cuenta con el nuevo correo
        echo '<script>';
        echo 'alert("Lo sentimos al parecer ya existe un usuario registrado con el nuevo correo ingresado.");';
        echo 'window.location = "../editar-perfil.php";';
        echo '</script>'; 
        exit();
    }
    //Validar Usuario
    $consulta = "SELECT * FROM usuario WHERE usuario='$nuevoUsuario' AND usuario!='$usuarioActual'";
    $resultado = mysqli_query( $conexion, $consulta );

    if ( mysqli_num_rows( $resultado )>0 ) {
        //Si ya hay una cuenta con el nuevo correo
        echo '<script>';
        echo 'alert("Lo sentimos al parecer ya existe un usuario registrado con el nuevo nuevo Usuario ingresado.");';
        echo 'window.location = "../editar-perfil.php";';
        echo '</script>'; 
        exit();
    }

    //Actualizamos la tabla usuario con los nuevos datos
    $consulta = "UPDATE usuario SET nombre = '$nuevoNombre', apellidos = '$nuevoApellidos',usuario = '$nuevoUsuario', correo = '$nuevoCorreo',celular = '$nuevoTelefono',sexo='$nuevoSexoAAgregar' WHERE id = '$idUsuario'";

    $resultado = mysqli_query( $conexion, $consulta );

    //Este error saldrá si deja vacio algun campo del formulario de edotar perfil
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }
    
    if ( $resultado ) {
        //Si se obtuvo un resultado de la actualizacion
        $filas_afectadas = mysqli_affected_rows( $conexion );
        //Verifico cantidad de filas afectadas
        if ( $filas_afectadas == 0 and ( $_SESSION[ 'nombre' ] != $nuevoNombre or $_SESSION[ 'apellidos' ] != $nuevoApellidos or $_SESSION[ 'usuario' ] != $nuevoUsuario or $_SESSION[ 'correo' ] != $nuevoCorreo or $_SESSION[ 'celular' ] != $nuevoTelefono or $_SESSION[ 'sexo' ] != $nuevoSexo ) ) {
            echo '<script>';
            echo 'alert("Lo sentimos al parecer no se realizaron cambios para el Usuario.");';
            echo 'window.location = "../editar-perfil.php";';
            echo '</script>';    
            exit();
        }
    } else {
        echo '<script>';
        echo 'alert("Lo sentimos al parecer no se pudo realizar correctamente la Actualizacion de los datos del Usuario.");';
        echo 'window.location = "../editar-perfil.php";';
        echo '</script>';
        exit();
    }

    //Actualizamos las variables de Sesion Actual
    $_SESSION[ 'nombre' ] = $nuevoNombre;
    $_SESSION[ 'apellidos' ] = $nuevoApellidos;
    $_SESSION[ 'usuario' ] = $nuevoUsuario;
    //
    $_SESSION[ 'correo' ] = $nuevoCorreo;
    $_SESSION[ 'celular' ] = $nuevoTelefono;
    $_SESSION[ 'sexo' ] = $nuevoSexo;

    if ( isset( $_FILES[ 'foto' ] ) && $_FILES[ 'foto' ][ 'error' ] === 0 && $_FILES[ 'foto' ][ 'size' ] > 0 ) {
        // Se ha enviado un archivo y no ha ocurrido ningún error durante la carga
        // Y el tamaño del archivo es mayor a 0, lo que indica que se ha seleccionado una foto nueva
        // En este caso, puedes proceder a actualizar la foto de perfil del usuario con la nueva foto
        //Verificacion de tabla estado imagen
        $estadoImagen = 'Activa';
        $idEstadoImagen = -1;

        $consultaEstadoImagen = mysqli_query( $conexion, "SELECT * FROM estadoimagen WHERE estado='$estadoImagen'" );
        if ( mysqli_num_rows( $consultaEstadoImagen ) == 0 ) {
            //Si no existe el estado de imagen 'Activa'
            $insercionEstadoImagen = mysqli_query( $conexion, "INSERT INTO estadoimagen(estado) VALUES('$estadoImagen')" );

            if ( $insercionEstadoImagen ) {
                //Si se inserto correctamente el nuevo EstadoImagen 'Activa'
                $consultaEstadoImagen = mysqli_query( $conexion, "SELECT id FROM estadoimagen WHERE estado='$estadoImagen'" );
                $fila = mysqli_fetch_assoc( $consultaEstadoImagen );
                $idEstadoImagen = $fila[ 'id' ];
            } else {
                //Si NO se inserto correctamente el nuevo EstadoImagen 'Activa'
                echo '<script>';
                echo 'alert("Lo sentimos el estado de la imagen de la mascota no se pudo registrar.");';
                echo 'window.location = "../editar-perfil.php";';
                echo '</script>';
                exit();
            }
        } else {
            //Si existe el estado de Imagen 'Activa'
            $fila = mysqli_fetch_assoc( $consultaEstadoImagen );
            $idEstadoImagen = $fila[ 'id' ];
        }

        $insercionImagen = mysqli_query( $conexion, "INSERT INTO imagen(EstadoImagen_id,Usuario_id,url) VALUES('$idEstadoImagen','$idUsuario','$rutaFinalDeImagen')" );

        if ( $insercionImagen ) {
            //Si se inserto correctamente la Imagen de la mascota

            move_uploaded_file( $rutaDeImagen, $rutaFinalDeImagen );
            //Movemos o copiamos la imagen del lugar temporal donde estaba al lugar donde deseamos guardarla
            $_SESSION[ 'url' ] = $rutaFinalDeImagen;
            echo '<script>';
            echo 'alert("Imagen de usuario añadida exitosamente!");';
            echo 'window.location = "../ver-perfil.php";';
            echo '</script>';
            exit();
        } else {
            //Si NO se inserto correctamente la Imagen de la mascota
            echo '<script>';
            echo 'alert("Algo salió mal en el registro de la imagen de la mascota, por favor intente de nuevo.");';
            echo 'window.location = "../editar-perfil.php";';
            echo '</script>';
            exit();
        }
        mysqli_close( $conexion );
        //Cerramos la conexion a la BD

    } else {
        // No se ha seleccionado ninguna foto o ha ocurrido un error durante la carga del archivo
        // En este caso, no se actualizará la foto de perfil y se mantendrá la foto actual del usuario
        echo '<script>';
        echo 'alert("Cambios realizados exitosamente!");';
        echo 'window.location = "../ver-perfil.php";';
        echo '</script>';
        exit();
    }

?>
