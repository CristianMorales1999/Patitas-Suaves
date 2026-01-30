<?php 
    session_start();
    if ( $_SESSION ) {
        //Si un usuario ha iniciado sesion
        $nombreUsuario=$_SESSION['nombre'];
        $apellidosUsuario=$_SESSION['apellidos'];
        $correoUsuario=$_SESSION['correo'];

        $delimiter=" ";
        $nombre=explode($delimiter, $nombreUsuario)[0];
        $apellido=explode($delimiter, $apellidosUsuario)[0];

        $nombreCompleto = $nombre . " " . $apellido;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Cambios de diego actualizado-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style-formulario-adoptar.css">
    <link rel="stylesheet" href="estilo-select-lugar.css">
    <link rel="stylesheet" href="estilo-icono.css">
    <!--Fin Cambios de diego actualizado-->

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>Formulario Adoptar</title>
</head>

<body>
    <!--========== SCROLL TOP ==========-->
    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!"
        target="_blank" class="scrolltop" id="scroll-top">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ===================Navbar========================= -->
    <!--Cambios de diego actualizado-->
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="/img/logo_mascota.png" alt>
            </a>
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="/img/logo_mascota.png" alt>
                </a>
            </div>
            <ul>
                <li>
                    <a href="quienes-somos.php">¿Quiénes Somos?</a>
                </li>
                <li>
                    <a href="adoptar.php">Adoptar</a>
                </li>

                <li>
                    <a href="dar-adopcion.php">Dar en Adopción</a>
                </li>
                <li>
                    <a href="refugios.php">Refugios</a>
                </li>
                <li>
                    <a href="contacto.php">Contacto</a>
                </li>
                <!-- AQUI HAY UN ICONO DE USUARIO CUANDO SE LOGUEA CON EXITO  -->
                <?php
                //session_start();
                if ($_SESSION) {
                    ?>
                    <li class="nav__user">
                        <a href="#" class="icono"><i class='bx bxs-user-circle' style='color:#fff'></i></a>
                        <ul class="list__show">
                            <li>
                                <a href="ver-perfil.php" class="user__inside">Ver Perfil</a>
                            </li>
                            <li>
                                <a href="php/cerrarSesion.php" class="user__inside">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="login.php" class="nav__link active">Iniciar Sesión</a></li>
                    <?php
                } ?>
            </ul>
        </nav>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
    <!--Fin Cambios de diego actualizado-->

    <!-- ========================== Formulario de Adopción ============================ -->
    <section class="formulario">
        <div class="container">
            <div class="form-image">
            </div>
            <div class="form">

                <?php 
                    require_once 'php/obtenerMascotas.php';
                    require_once 'php/obtenerUsuarios.php';
                    
                    $index=$_GET['indice'];//Indice que ocupa en el arreglo obtenido por 'php/obtenerMascotas.php'
                    $idMascota=$mascotasDisponibles[$index]['id'];//Id que tiene en la base de datos
                    $idUsuarioDuenioMascota=$mascotasDisponibles[$index]['Usuario_id'];
                ?>

                <style>
                    input[readonly] {
                        background-color: #f2f2f2;
                        color: #333333;
                        /*cursor: not-allowed;*/
                    }
                </style>
                <!--Aqui modifiqué-->
                <form action="php/adopcion.php?indice=<?php echo $index; ?>" method="POST" enctype="multipart/form-data" class="formulario-adoptar" id="formulario-adoptar">
                    <!--Inicio formulario-->
                    
                    <!--Valores conocidos Ocultos-->
                    <input type="hidden" name="idMascota" value="<?php echo $idMascota; ?>">
                    <input type="hidden" name="idUsuarioDuenioMascota" value="<?php echo $idUsuarioDuenioMascota; ?>">

                    <div class="form-header">
                        <div class="title">
                            <h1>Formulario para Adoptar</h1>
                        </div>
                    </div>

                    <div class="input-group">

                        <div class="input-box" id="grupo__nombres">
                            <label for="firstname" class="formulario__label">Nombres</label>
                            <div class="formulario__grupo-input">
                                    <input type="text" name="nombreUsuario" id="nombres" placeholder="Escribir nombres" value="<?php echo $nombreCompleto; ?>" readonly>
        
                            </div>
                        </div>

                        <!-- <div class="input-box" id="grupo__apellidos">
                            <label for="lastname" class="formulario__label">Apellidos</label>
                            <div class="formulario__grupo-input">
                                <input type="text" name="apellidoUsuario" id="apellidos" placeholder="Escribir apellidos" value="<?php echo $apellidosUsuario; ?>" readonly>
                            </div>
                        </div> -->

                        <div class="input-box" id="grupo__dni">
                            <label for="dni" class="formulario_label">DNI</label>
                            <div class="formulario__grupo-input">
                                    <input type="tel" name="dni" id="dni" pattern="[0-9]{8}" placeholder="Digite su DNI" required>
                            </div>
                        </div>

                        <div class="input-box" id="grupo__telefono">
                            <label for="number" class="formulario__label">Número de teléfono</label>
                            <div class="formulario__grupo-input">
                                <input type="tel" name="telefono" id="number" pattern="[0-9]{9}" placeholder="Digite su número" required>
                            </div>
                        </div>


                        <div class="input-box" id="grupo__ocupacion">
                            <label for="ocupation" class="formulario__label">Trabajo u ocupación</label>
                            <div class="formulario__grupo-input">
                                <input type="text" name="ocupation" id="ocupation" placeholder="Escribir su ocupación" required>
                            </div>
                        </div>

                        <div class="input-box" id="grupo__integrantes-familia">
                            <label for="familia" class="formulario__label">Cantidad de Integrantes en la Familia</label>
                            <div class="formulario__grupo-input">
                                <input type="tel" name="familia" id="familia" pattern="[1-9]" placeholder="Cantidad Integrantes" required>  
                            </div>
                        </div>

                        <!---->
                        <div class="input-box" id="grupo__hijos">
                            <label for="hijos" class="formulario__label">Número de hijos</label>
                            <div class="formulario__grupo-input">
                                <input type="tel" name="nHijos" id="hijos" pattern="[0-9]{1}" placeholder="Digite el número">
                            </div>
                        </div>

                        <div class="input-box">
                            <label for="address">Direccion</label>
                            <div class="siderbar-box">

                                <select name="selectDepartamento" onchange="cambia()" class="form-control" required="">
                                    <option value="">Seleccione Departamento</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Ancash">Ancash</option>
                                    <option value="Apurímac">Apurímac</option>
                                    <option value="Arequipa">Arequipa</option>
                                    <option value="Ayacucho">Ayacucho</option>
                                    <option value="Cajamarca">Cajamarca</option>
                                    <option value="Callao">Callao</option>
                                    <option value="Cuzco">Cuzco </option>
                                    <option value="Huancavelica">Huancavelica</option>
                                    <option value="Huánuco">Huánuco</option>
                                    <option value="Ica">Ica</option>
                                    <option value="Junín">Junín</option>
                                    <option value="La_Libertad">La Libertad</option>
                                    <option value="Lambayeque">Lambayeque</option>
                                    <option value="Lima">Lima</option>
                                    <option value="Loreto">Loreto</option>
                                    <option value="Madre_de_Dios">Madre de Dios</option>
                                    <option value="Moquegua">Moquegua</option>
                                    <option value="Pasco">Pasco</option>
                                    <option value="Piura">Piura</option>
                                    <option value="Puno">Puno</option>
                                    <option value="San_Martín">San Martín</option>
                                    <option value="Tacna">Tacna</option>
                                    <option value="Tumbes">Tumbes</option>
                                    <option value="Ucayali">Ucayali</option>
                                </select>
                            </div>

                            <select class="form-control" name="selectProvincia" onchange="cambiaDistrito()" required="">
                                <option>Seleccione la Provincia</option>
                            </select>

                            <select class="form-control" name="selectDistrito" required="">
                                <option>Seleccione el Distrito</option>
                            </select>
                        </div>

                        <div class="input-box" id="grupo__domicilio">
                            <label for="domicilio" class="formulario__label">Dirección de domicilio</label>
                            <div class="formulario__grupo-input">
                                <input type="text" name="domicilio" id="domicilio"  placeholder="Dirección" required>
                            </div>
                        </div>

                        <div class="input-box" id="grupo__motivo">
                            <label for="motivo" class="formulario__label">Motivo de adopcion</label>
                            <div class="formulario__grupo-input">
                                <textarea name="motivo" id="motivo" rows="5" cols="25" placeholder="Escribir motivo..."></textarea>
                            </div>
                        </div>

                        <!-- <div class="input-box" id="grupo__correo">
                            <label for="email" class="formulario__label">Correo</label>
                            <div class="formulario__grupo-input">
                                <input type="email" name="email" id="email" placeholder="Escribir email" value="<?php echo $correoUsuario; ?>" readonly>
                            </div>
                        </div> -->
                    </div>

                    <div class="input-group">

                        <div class="status-inputs">

                            <div class="status-title">
                                <h6>Estado civil</h6>
                            </div>

                            <div class="status-group">
                                <div class="status-input">
                                    <input id="single" type="radio" name="status" value="Soltero">
                                    <label for="single">Soltero</label>
                                </div>
                                <div class="status-input">
                                    <input id="married" type="radio" name="status" value="Casado">
                                    <label for="married">Casado</label>
                                </div>
                                <div class="status-input">
                                    <input id="widower" type="radio" name="status" value="Viudo">
                                    <label for="widower">Viudo</label>
                                </div>
                                <div class="status-input">
                                    <input id="divorced" type="radio" name="status" value="Divorciado">
                                    <label for="divorced">Divorciado</label>
                                </div>
                            </div>

                        </div>

                        <div class="gender-inputs">

                            <div class="gender-title">
                                <h6>Sexo</h6>
                            </div>

                            <div class="gender-group">
                                <div class="gender-input">
                                    <input id="female" type="radio" name="sexo" value="0">
                                    <label for="female">Femenino</label>
                                </div>
                                <div class="gender-input">
                                    <input id="male" type="radio" name="sexo" value="1">
                                    <label for="male">Masculino</label>
                                </div>
                            </div>
                        </div>

                        <div class="mascotas-antes-inputs">
                            <div class="mascotas-antes-title">
                                <h6>Mascotas anteriormente</h6>
                            </div>

                            <div class="mascotas-antes-group">
                                <div class="mascotas-antes-input">
                                    <input id="si-antes" type="radio" name="mascotasAntes" value="1">
                                    <label for="si-antes">Si</label>
                                </div>
                                <div class="mascotas-antes-input">
                                    <input id="no-antes" type="radio" name="mascotasAntes" value="0">
                                    <label for="no-antes">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="mascotas-ahora-inputs">
                            <div class="mascotas-ahora-title">
                                <h6>Mascotas ahora</h6>
                            </div>

                            <div class="mascotas-ahora-group">
                                <div class="mascotas-ahora-input">
                                    <input id="si-ahora" type="radio" name="mascotasAhora" value="1">
                                    <label for="si-ahora">Si</label>
                                </div>
                                <div class="mascotas-ahora-input">
                                    <input id="no-ahora" type="radio" name="mascotasAhora" value="0">
                                    <label for="no-ahora">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="formulario__mensaje" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar continue-button">
                        <button type="submit" class="formulario__btn">Enviar</button>
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </div>
                </form><!--Fin formulario-->
            </div>
        </div>

        </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- ========================== Footer ============================ -->
    <footer class="footer">
        <div class="contacto">
            <div class="contacto-row">
                <div class="footer-links">
                    <h4>Nosotros</h4>
                    <ul>
                        <li><a href="#">Acerca de Patitas Suaves</a></li>
                        <li><a href="#">Contacta con nosotros</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                    </ul>
                </div>
                <div class="footer-links">

                    <h4>Información</h4>
                    <ul>
                        <li><a href="#">Horarios de Atención</a></li>
                        <li><a href="#">Guías de Cuidados</a></li>
                        <li><a href="#">Reportar Problema</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="footer-links">

                    <h4>Links</h4>
                    <ul>
                        <li><a href="quienes-somos.php">¿Quiénes Somos?</a></li>
                        <!--<li><a href="mascotas.php">Mascotas</a></li>-->
                        <li><a href="adoptar.php">Adoptar</a></li>
                        <li><a href="dar-adopcion.php">Dar Adopción</a></li>
                        <li><a href="refugios.php">Refugios</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Síguenos</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="lugar-residencia.js"></script>
    <!--<script src="validacion-adoptar.js"></script>-->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

</html>

<?php 
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