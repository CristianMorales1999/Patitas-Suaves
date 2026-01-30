<?php 
    session_start();
    if ( $_SESSION ) {
        //Si un usuario ha iniciado sesion
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
        <link rel="stylesheet" href="style-dar-adopcion.css">
        <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
        <!--Fin Cambios de diego actualizado-->
        
        <title>Dar en Adopción</title>
    </head>

    <body>
            <!--========== SCROLL TOP ==========-->
        <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!" target="_blank" class="scrolltop" id="scroll-top">
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
                    <?php
                        if ($_SESSION) { ?>
                            <li><a href="dar-adopcion.php">Dar En Adopción</a></li>
                        <?php } 
                    ?>
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

        <!-- ========================== Contacto ============================ -->
        <section class="formulario">
            <div class="container">
                <div class="form-image">
                </div>
                <div class="form">

                    <form action="php/dar_en_adopcion.php" method="POST" enctype="multipart/form-data"><!--Inicio formulario-->

                        <div class="form-header">
                            <div class="title">
                                <h1>Formulario para dar en adopcion</h1>
                            </div>
                        </div>

                        <div class="input-group">

                            <div class="input-box">
                                <label for="firstname">Nombre de la mascota</label>
                                <input type="text" name="nombreMascota" placeholder="Escribir nombre" required>
                            </div>

                            <div class="input-box">
                                <label for="raza">Raza</label>
                                <input type="text" name="raza" id="raza" placeholder="De raza o mestizo" required>
                            </div>

                            <div class="input-box">
                                <label for="vacuna">Fecha de nacimiento Aprox.</label>
                                <input type="date" name="fechaDeNacimiento" id="vacuna" required>
                            </div>          

                            <div class="input-box">
                                <label>Subir una foto del animal</label>
                                <input type="file" name="avatar" id="avatar" accept=".png,.jpeg,.jpg" required>
                            </div>

                            <div class="input-box">
                                <label for="color">Estado de Salud</label>
                                <input type="text" name="estadoDeSalud" id="salud" placeholder="Escribir estado de Salud" required>
                            </div>

                            <div class="input-box">
                                <label for="color">Color del animal</label>
                                <input type="text" name="colores" id="color" placeholder="Escribir color" required>
                            </div>

                        </div>

                        <div class="input-group">

                            <div class="edad-inputs">

                                <div class="edad-title">
                                    <h6>Especie</h6>
                                </div>

                                <div class="edad-group">
                                    <div class="edad-input">
                                        <input id="cachorro" type="radio" name="especie" value="Perro">
                                        <label for="cachorro">Perro</label>
                                    </div>
                                    <div class="edad-input">
                                        <input id="joven" type="radio" name="especie" value="Gato">
                                        <label for="joven">Gato</label>
                                    </div>
                                    <div class="edad-input">
                                        <input id="adulto-joven" type="radio" name="especie" value="Otro">
                                        <label for="adulto-joven">Otro</label>
                                    </div>
                                </div>

                            </div>

                            <div class="pelaje-inputs">

                                <div class="pelaje-title">
                                    <h6>Cantidad de pelaje</h6>
                                </div>

                                <div class="pelaje-group">

                                    <div class="pelaje-input">
                                        <input id="Corto" type="radio" name="pelaje" value="Corto">
                                        <label for="Corto">Corto</label>
                                    </div>

                                    <div class="pelaje-input">
                                        <input id="Mediano" type="radio" name="pelaje" value="Mediano">
                                        <label for="Mediano">Mediano</label>
                                    </div>

                                    <div class="pelaje-input">
                                        <input id="Largo" type="radio" name="pelaje" value="Largo">
                                        <label for="Largo">Largo</label>
                                    </div>

                                </div>

                            </div>

                            <div class="gender-inputs">

                                <div class="gender-title">
                                    <h6>Sexo</h6>
                                </div>

                                <div class="gender-group">
                                    <div class="gender-input">
                                        <input id="female" type="radio" name="sexo" value="Hembra">
                                        <label for="female">Hembra</label>
                                    </div>
                                    <div class="gender-input">
                                        <input id="male" type="radio" name="sexo" value="Macho">
                                        <label for="male">Macho</label>
                                    </div>
                                </div>
                            </div>

                            <div class="historial-inputs">
                                <div class="historial-title">
                                    <h6>Esterilización</h6>
                                </div>
                                <div class="historial-group">
                                    <div class="historial-input">
                                        <input id="si" type="radio" name="esterilizacion" value="1">
                                        <label for="si">Si</label>
                                    </div>
                                    <div class="historial-input">
                                        <input id="no" type="radio" name="esterilizacion" value="0">
                                        <label for="no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="tamanio-inputs">
                                <div class="tamanio-title">
                                    <h6>Tamaño</h6>
                                </div>
                                <div class="tamanio-group">
                                    <div class="tamanio-input">
                                        <input id="small" type="radio" name="tamanio" value="Pequeño">
                                        <label for="small">Pequeño</label>
                                    </div>
                                    <div class="tamanio-input">
                                        <input id="medium" type="radio" name="tamanio" value="Mediano">
                                        <label for="medium">Mediano</label>
                                    </div>
                                    <div class="tamanio-input">
                                        <input id="big" type="radio" name="tamanio" value="Grande">
                                        <label for="big">Grande</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="input-group">
                            <div class="input-box">
                                <label for="descripcion">Descripción de la mascota</label>
                                <textarea name="descripcion" id="descripcion" cols="110" rows="3" placeholder="Escribe una pequeña descripcion de la mascota"></textarea>
                            </div>
                        </div>
                        <div class="continue-button">
                            <button><a href="#">Enviar</a> </button>
                        </div>
                    </form><!--Fin formulario-->

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