<?php
 
    session_start();
    if($_SESSION){//Si un usuario ha iniciado seccion
        include 'conexion_be.php';    

        $nombre = $_POST['nombreMascota'];//Nombre mascota
        $especie=$_POST['especie'];
        $raza=$_POST['raza'];//Raza de la mascota
        $fechaDeNacimiento=$_POST['fechaDeNacimiento'];//Fecha de ultima puesta de vacuna
        $sexo=$_POST['sexo'];
        $tamanio=$_POST['tamanio'];
        $colores=$_POST['colores'];
        $pelaje=$_POST['pelaje'];
        $estadoDeSalud=$_POST['estadoDeSalud'];
        $esterilizacion=$_POST['esterilizacion'];
        $disponibilidad="1";
        $descripcion=$_POST['descripcion'];
        date_default_timezone_set('America/Lima');
        $fechaDeRegistro=date("Y-m-d");

        $imagenMascota=$_FILES['avatar'];//Imagen de mascota
        $nombreImagen=$imagenMascota['name'];//Nombre de la imagen
        $rutaDeImagen=$imagenMascota['tmp_name'];//Ruta temporar de servidor donde esta la imagen subida
    
        $directorioDestino='imagenesMascotasRegistradas';//Carpeta donde voy a guardar las imagenes se vallan registrarndo en la bd
        $nombreUnico=uniqid().'_'.$nombreImagen;//Generamos un nombre unico para cada imagen que se suba
        $rutaFinalDeImagen=$directorioDestino.'/'.$nombreUnico;//Ruta donde se va a guardar la imagen 
    
        
        //Correo del usuario que esta en sesion ahora
        $correoUsuarioActual=$_SESSION['correo'];

        //echo "<br>Nombre: ".$nombre;."<br>Especie: ".$especie."<br>Raza: ".$raza."<br>Fecha de Nacimiento: ".$fechaDeNacimiento."<br>Sexo: ".$sexo."<br>Tamaño: ".$tamanio."<br>Colores: ".$colores."<br>Cantidad de pelaje: ".$pelaje."<br>Estado de Salud: ".$estadoDeSalud."<br>Esterilizacion: ".$esterilizacion."<br>Disponibilidad: ".$disponibilidad."<br>Descripcion: ".$descripcion."<br>Fecha de Registro: ".$fechaDeRegistro."<br>Nombre imagen: ".$nombreImagen."<br>";
        /** */
        $usuarioActual = mysqli_query($conexion, "SELECT id FROM usuario WHERE correo='$correoUsuarioActual'");//Busco obtener el id del usuario que esta en sesion ahora

        if(mysqli_num_rows($usuarioActual)>0){//Si se encontro algún id 

            $fila=mysqli_fetch_assoc($usuarioActual);
            $idUsuario=$fila['id'];

            //Verificar que la mascota exista en la base de datos
            $verificar_mascota = mysqli_query($conexion, "SELECT * FROM mascota WHERE nombre='$nombre' AND Usuario_id='$idUsuario'");

            if(mysqli_num_rows($verificar_mascota)>0){//Si la mascota ya existe
                echo '
                    <script>
                        alert("Lo sentimos al parecer esta mascota ya esta registrada.");
                        window.location = "../dar-adopcion.php";
                    </script>
                ';
                exit();
            }
            
            $estadoMascota="Disponible";
            $idEstadoMascota=-1;

            $consultaEstadoMascota= mysqli_query($conexion, "SELECT * FROM estadomascota WHERE estado='$estadoMascota'");

            if(mysqli_num_rows($consultaEstadoMascota)==0){//Si no existe aun el estado disponible para una mascota
                $insercionEstadoMascota= mysqli_query($conexion, "INSERT INTO estadomascota(estado) VALUES('$estadoMascota')");

                if($insercionEstadoMascota){//Si se insertó correctamente el nuevo estado de mascota 
                    $consultaEstadoMascota= mysqli_query($conexion, "SELECT id FROM estadomascota WHERE estado='$estadoMascota'");//Busco obtener el id del usuario que esta en sesion ahora
                    $fila=mysqli_fetch_assoc($consultaEstadoMascota);
                    $idEstadoMascota=$fila['id'];
                }
                else{//Si no se inserto el nuevo estado mascota 
                    echo '
                    <script>
                        alert("Lo sentimos el estado de la mascota no se pudo registrar.");
                        window.location = "../dar-adopcion.php";
                    </script>
                    ';
                    exit();
                }
            }
            else{
                $fila=mysqli_fetch_assoc($consultaEstadoMascota);
                $idEstadoMascota=$fila['id'];
            }

            //Guardamos los datos que acabamos de obtener de la nueva mascota
            $consulta="INSERT INTO mascota(EstadoMascota_id,Usuario_id,nombre,especie,raza,fechaDeNacimiento,sexo,tamanio,colores,cantidadDePelaje,estadoDeSalud,esterilizacion,disponibilidad,descripcion,fechaDeRegistro)
                        VALUES('$idEstadoMascota','$idUsuario','$nombre','$especie','$raza', '$fechaDeNacimiento', '$sexo','$tamanio','$colores','$pelaje','$estadoDeSalud','$esterilizacion','$disponibilidad','$descripcion','$fechaDeRegistro')";

            $insercionMascota = mysqli_query($conexion,$consulta);//Mandamos insertar la nueva mascota en la base de datos

            if($insercionMascota){//Si se insertó correctamente la nueva mascota
                echo '
                <script>
                    alert("Nueva mascota agregada exitosamente!");
                </script>
                ';
            }else{//Si no se inserto correctamente la nueva mascota 
                echo '
                <script>
                    alert("Lo sentimos la nueva mascota no se pudo registrar.");
                    window.location = "../dar-adopcion.php";
                </script>
                ';
                exit();
            }

            //Obtenemos el id de la mascota que quiere adoptar
            $resultado=mysqli_query($conexion,"SELECT id AS idMascota FROM mascota WHERE nombre='$nombre' AND Usuario_id='$idUsuario'");
            $fila=mysqli_fetch_assoc($resultado);
            $idMascota=$fila['idMascota'];


            //Verificacion de tabla estado imagen
            $estadoImagen="Activa";
            $idEstadoImagen=-1;

            $consultaEstadoImagen= mysqli_query($conexion, "SELECT * FROM estadoimagen WHERE estado='$estadoImagen'");

            if(mysqli_num_rows($consultaEstadoImagen)==0){//Si no existe el estado de imagen "Activa"
                $insercionEstadoImagen= mysqli_query($conexion, "INSERT INTO estadoimagen(estado) VALUES('$estadoImagen')");

                if($insercionEstadoImagen){//Si se inserto correctamente el nuevo EstadoImagen "Activa"
                    $consultaEstadoImagen= mysqli_query($conexion, "SELECT id FROM estadoimagen WHERE estado='$estadoImagen'");
                    $fila=mysqli_fetch_assoc($consultaEstadoImagen);
                    $idEstadoImagen=$fila['id'];
                }
                else{//Si NO se inserto correctamente el nuevo EstadoImagen "Activa"
                    echo '
                    <script>
                        alert("Lo sentimos el estado de la imagen de la mascota no se pudo registrar.");
                        window.location = "../dar-adopcion.php";
                    </script>
                    ';
                    exit();
                }
            }
            else{//Si existe el estado de Imagen "Activa"
                $fila=mysqli_fetch_assoc($consultaEstadoImagen);
                $idEstadoImagen=$fila['id'];
            }

            $insercionImagen = mysqli_query($conexion,"INSERT INTO imagen(EstadoImagen_id,Mascota_id,url) VALUES('$idEstadoImagen','$idMascota','$rutaFinalDeImagen')");

            if($insercionImagen){//Si se inserto correctamente la Imagen de la mascota

                move_uploaded_file($rutaDeImagen,$rutaFinalDeImagen);//Movemos o copiamos la imagen del lugar temporal donde estaba al lugar donde deseamos guardarla
            
                echo '
                    <script>
                        alert("Imagen de mascota añadida exitosamente!");
                        window.location = "../index.php";
                    </script>
                ';
                exit();
            }else{//Si NO se inserto correctamente la Imagen de la mascota
                echo '
                <script>
                    alert("Algo salió mal en el registro de la imagen de la mascota, por favor intente de nuevo.");
                    window.location = "../dar-adopcion.php";
                </script>
                ';
                exit();
            }
            mysqli_close($conexion);//Cerramos la conexion a la BD
        }else{
            echo '
                <script>
                    alert("Lo sentimos no se encontro al usuario al que le corresponde el correo con el que acaba de ingresar.");
                    window.location = "../login.php";
                </script>
            ';
            exit();
        }
       /* */
    }
    else{//Si NO ha iniciado sesion ningun usuario
        echo '
            <script>
                alert("Lo sentimos al parecer usted aún no se ha creado una cuenta.");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
     
?>