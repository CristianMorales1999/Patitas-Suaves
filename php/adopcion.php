<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

session_start();
if ( $_SESSION ) {
    //Si un usuario ha iniciado sesion
    include 'conexion_be.php';

    $index = $_GET[ 'indice' ];
    //Parametro en cadena

    $nombre = $_POST[ 'nombreUsuario' ];
    //$apellidos = $_POST[ 'apellidoUsuario' ];

    $dni = $_POST[ 'dni' ];
    $telefono = $_POST[ 'telefono' ];
    $trabajoOcupacion = $_POST[ 'ocupation' ];
    $nHijos = $_POST[ 'nHijos' ];

    $departamento = $_POST[ 'selectDepartamento' ];
    $departamento = str_replace( '_', ' ', $departamento );

    $provincia = $_POST[ 'selectProvincia' ];
    $provincia = str_replace( '_', ' ', $provincia );

    $distrito = $_POST[ 'selectDistrito' ];
    $distrito = str_replace( '_', ' ', $distrito );

    $direccion =$_POST[ 'domicilio' ];

    $nIntegrantesEnFamilia = $_POST[ 'familia' ];
    $estadoCivil = $_POST[ 'status' ];
    $sexo = $_POST[ 'sexo' ];
    $mascotasPasadas = $_POST[ 'mascotasAntes' ];
    $mascotasActuales = $_POST[ 'mascotasAhora' ];

    $idDador = $_POST[ 'idUsuarioDuenioMascota' ];
    $idMascotaSolicitada = $_POST[ 'idMascota' ];
    $idAdoptante = $_SESSION[ 'id' ];

    $motivo =$_POST[ 'motivo' ];

    //Verificacion de tabla Departamento
    $idDepartamento = -1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM departamento WHERE departamento='$departamento'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe el Departamento Seleccionado en la BD
        $insercion = mysqli_query( $conexion, "INSERT INTO departamento(departamento) VALUES('$departamento')" );

        if ( $insercion ) {
            //Si se inserto correctamente el Departamento
            $consulta = mysqli_query( $conexion, "SELECT id FROM departamento WHERE departamento='$departamento'" );
            $fila = mysqli_fetch_assoc( $consulta );
            $idDepartamento = $fila[ 'id' ];
        } else {
            //Si NO se inserto correctamente el Departamento Seleccionado en la BD
            echo '<script>';
            echo 'alert("Lo sentimos el Departamento no se pudo registrar.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe el Departamento
        $fila = mysqli_fetch_assoc( $consulta );
        $idDepartamento = $fila[ 'id' ];
    }

    //Verificacion de tabla Provincia
    $idProvincia = -1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM provincia WHERE Departamento_id='$idDepartamento' AND provincia='$provincia'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe la Provincia Seleccionado en la BD
        $insercion = mysqli_query( $conexion, "INSERT INTO provincia(Departamento_id,provincia) VALUES('$idDepartamento','$provincia')" );

        if ( $insercion ) {
            //Si se inserto correctamente la nueva Provincia a la BD
            $consulta = mysqli_query( $conexion, "SELECT id FROM provincia WHERE Departamento_id='$idDepartamento' AND provincia='$provincia'" );
            $fila = mysqli_fetch_assoc( $consulta );
            $idProvincia = $fila[ 'id' ];
        } else {
            //Si NO se inserto correctamente la Provincia
            echo '<script>';
            echo 'alert("Lo sentimos la Provincia no se pudo registrar.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe la Provincia
        $fila = mysqli_fetch_assoc( $consulta );
        $idProvincia = $fila[ 'id' ];
    }

    //Verificacion de tabla Distrito
    $idDistrito = -1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM distrito WHERE Provincia_id='$idProvincia' AND distrito='$distrito'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe el Distrito Seleccionado en la BD
        $insercion = mysqli_query( $conexion, "INSERT INTO distrito(Provincia_id,distrito) VALUES('$idProvincia','$distrito')" );

        if ( $insercion ) {
            //Si se inserto correctamente el nuevo Distrito
            $consulta = mysqli_query( $conexion, "SELECT id FROM distrito WHERE Provincia_id='$idProvincia' AND distrito='$distrito'" );
            $fila = mysqli_fetch_assoc( $consulta );
            $idDistrito = $fila[ 'id' ];
        } else {
            //Si NO se inserto correctamente el nuevo Distrito
            echo '<script>';
            echo 'alert("Lo sentimos el Distrito no se pudo registrar.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe el Distrito
        $fila = mysqli_fetch_assoc( $consulta );
        $idDistrito = $fila[ 'id' ];
    }

    //Verificacion de tabla Ubigeo
    $idUbigeo = -1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM ubigeo WHERE Departamento_id='$idDepartamento' AND Provincia_id='$idProvincia' AND Distrito_id='$idDistrito'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe el Ubigeo en la BD
        $insercion = mysqli_query( $conexion, "INSERT INTO ubigeo(Departamento_id,Provincia_id,Distrito_id) VALUES('$idDepartamento','$idProvincia','$idDistrito')" );

        if ( $insercion ) {
            //Si se inserto correctamente el nuevo Ubigeo
            $consulta = mysqli_query( $conexion, "SELECT id FROM ubigeo WHERE Departamento_id='$idDepartamento' AND Provincia_id='$idProvincia' AND Distrito_id='$idDistrito'" );
            $fila = mysqli_fetch_assoc( $consulta );
            $idUbigeo = $fila[ 'id' ];
        } else {
            //Si NO se inserto correctamente el nuevo Ubigeo
            echo '<script>';
            echo 'alert("Lo sentimos el Ubigeo no se pudo registrar.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe el Ubigeo en la BD
        $fila = mysqli_fetch_assoc( $consulta );
        $idUbigeo = $fila[ 'id' ];
    }

    //echo '<br>Nombre: '.$nombre.'<br>Apellidos: '.$apellidos.'<br>DNI: '.$dni.'<br>';
    //echo '<br>Telefono y/o celular: '.$telefono.'<br>Ocupacion: '.$trabajoOcupacion.'<br>Numero de Hijos: '.$nHijos.'<br>';
    //echo '<br>Departamento: '.$departamento.'<br>Provincia: '.$provincia.'<br>Distrito: '.$distrito.'<br>';
    //echo '<br>Direccion: '.$direccion.'<br>Cantidad de integrantes de familia: '.$nIntegrantesEnFamilia.'<br>';
    //echo '<br>Correo: '.$correo.'<br>Estado Civil: '.$estadoCivil.'<br>Sexo: '.$sexo.'<br>';
    //echo '<br>¿Tuvo mascotas anteriormente?: '.$mascotasPasadas.'<br>¿Tiene mascotas ahora?: '.$mascotasActuales.'<br>';
    //echo '<br>Id dador: '.$idDador.'<br>id Mascota: '.$idMascotaSolicitada.'<br>id Adoptante: '.$idAdoptante.'<br>';

    //Guardamos los datos extras que acabamos de obtener del usuario
    $consulta = "UPDATE usuario SET Ubigeo_id='$idUbigeo', dni = '$dni', sexo = '$sexo', direccion = '$direccion', celular = '$telefono',trabajoOcupacion='$trabajoOcupacion', mascotasPasadas='$mascotasPasadas', mascotasActualidad='$mascotasActuales', estadoCivil='$estadoCivil', nroDeHijos='$nHijos', nroDeIntegrantesFamilia='$nIntegrantesEnFamilia' WHERE id = '$idAdoptante'";
    $actualizacionDatosUsuario = mysqli_query( $conexion, $consulta );

    //echo '<br>Consulta: '.$consulta.'<br>';

    if ( $actualizacionDatosUsuario ) {
        echo '
        <script>
            alert("Datos adicionales de Usuario Actualizados correctamente!");
        </script>
        ';
    } else {
        echo '<script>';
        echo 'alert("Algo salió mal en la actualizacion de los datos adicionales del Usuario, por favor intente de nuevo.");';
        echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
        echo '</script>';
        exit();
    }

    //Verificacion de tabla EstadoAdopcion
    $estadoAdopcion = 'Pendiente';
    $idEstadoAdopcion = -1;

    $consulta = mysqli_query( $conexion, "SELECT * FROM estadoadopcion WHERE estado='$estadoAdopcion'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe el Estado de Adopcion en la BD
        $insercion = mysqli_query( $conexion, "INSERT INTO estadoadopcion(estado) VALUES('$estadoAdopcion')" );

        if ( $insercion ) {
            //Si se inserto correctamente el nuevo Estado de Adopcion
            $consulta = mysqli_query( $conexion, "SELECT id FROM estadoadopcion WHERE estado='$estadoAdopcion'" );
            $fila = mysqli_fetch_assoc( $consulta );
            $idEstadoAdopcion = $fila[ 'id' ];
        } else {
            //Si NO se inserto correctamente el nuevo Estado de Adopcion
            echo '<script>';
            echo 'alert("Lo sentimos el Estado de Adopcion no se pudo registrar.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe el Estado de Adopcion en la BD
        $fila = mysqli_fetch_assoc( $consulta );
        $idEstadoAdopcion = $fila[ 'id' ];
    }

    //Verificacion de tabla Adopcion
    $consulta = mysqli_query( $conexion, "SELECT * FROM adopcion WHERE  EstadoAdopcion_id='$idEstadoAdopcion' AND Mascota_id='$idMascotaSolicitada' AND id_usuario_adoptante='$idAdoptante' AND id_usuario_dador='$idDador'" );

    if ( mysqli_num_rows( $consulta ) == 0 ) {
        //Si no existe la Adopcion en la BD
        date_default_timezone_set('America/Lima');
        $fechaDeRegistro = date( 'Y-m-d' );
        //Fecha de registro de una nueva solicitud de adopcion

        $insercion = mysqli_query( $conexion, "INSERT INTO adopcion(EstadoAdopcion_id,Mascota_id,id_usuario_adoptante,id_usuario_dador,fechaDeRegistro,motivo) VALUES('$idEstadoAdopcion','$idMascotaSolicitada','$idAdoptante','$idDador','$fechaDeRegistro','$motivo')" );

        if ( $insercion ) {
            //Si se inserto correctamente la Nueva Adopcion
            echo '
            <script>
                alert("Nueva Solicitud de Adopcion registrada exitosamente!");
                window.location = "../adoptar.php";
            </script>
            ';
            exit();
        } else {
            //Si NO se inserto correctamente la Nueva Adopcion
            echo '<script>';
            echo 'alert("Lo sentimos algo ha salido mal con el resgistro de la Solicitud de Adopcion, por favor intente de nuevo.");';
            echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
            echo '</script>';
            exit();
        }
    } else {
        //Si existe la Adopcion en la BD
        echo '<script>';
        echo 'alert("La actual Solicitud de Adopcion ya ha sido registrada tiempo atrás, por favor tenga paciencia pronto será atendida.");';
        echo 'window.location = "../formulario-adoptar.php?indice=' . $index . '";';
        echo '</script>';
        exit();
    }

    mysqli_close( $conexion );
    exit();
} else {
    //Si NO ha iniciado sesion ningun usuario
    echo '
        <script>
            alert("Lo sentimos al parecer usted aún no se ha creado una cuenta.");
            window.location = "../login.php";
        </script>
    ';
    exit();
}

?>