<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles-mascotas.css" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <title>Mascotas</title>
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!"
        target="_blank" class="scrolltop" id="scroll-top">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ===================Navbar========================= -->
    <header><!--Cambios de diego actualizado todo el header-->
        <div class="logo">
            <a href="index.php">
                <img src="/img/logo_mascota.png" alt="">
            </a>
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="/img/logo_mascota.png" alt="">
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
                <?php } ?>
                <li>
                    <a href="refugios.php">Refugios</a>
                </li>
                <li>
                    <a href="contacto.php">Contacto</a>
                </li>

                <!-- AQUI HAY UN ICONO DE USUARIO CUANDO SE LOGUEA CON EXITO          -->
                <?php
                //session_start();
                if ($_SESSION) {
                    ?>
                    <li class="nav__user">
                        <a href="#" class="icono"><i class='bx bxs-user-circle' style='color:#fff'></i></a>
                        <ul class="list__mostrar">
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
    <!-- ===================Fin del Navbar========================= -->

    <!-- ============================MASCOTAS============================= -->

    <div class="container">

        <div class="row">

            <div id="menu" class="col-xs-12 col-s-12 col-m-2 col-l-2">
                <div class="nav">
                    <ul class="list">
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/genero.svg" class="list__img">
                                <a href="adoptar.php" class="nav__link">Género</a>
                                <img src="assets/arrow.svg" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'sexo'; ?>&s=<?php echo 'Macho'; ?>"
                                        class="nav__link nav__link--inside">Macho</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'sexo'; ?>&s=<?php echo 'Hembra'; ?>"
                                        class="nav__link nav__link--inside">Hembra</a>
                                </li>

                            </ul>
                        </li>
                        <!-- ==================================================================================================== -->
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/tipe.svg" class="list__img">
                                <a href="adoptar.php" class="nav__link">Tipo</a>
                                <img src="assets/arrow.svg" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'especie'; ?>&s=<?php echo 'Perro'; ?>"
                                        class="nav__link nav__link--inside">Perros</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'especie'; ?>&s=<?php echo 'Gato'; ?>"
                                        class="nav__link nav__link--inside">Gatos</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'especie'; ?>&s=<?php echo 'Otro'; ?>"
                                        class="nav__link nav__link--inside">Otros</a>
                                </li>

                            </ul>
                        </li>
                        <!-- ==================================================================================================== -->
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/tamano.svg" class="list__img">
                                <a href="adoptar.php" class="nav__link">Tamaño</a>
                                <img src="assets/arrow.svg" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'tamanio'; ?>&s=<?php echo 'Pequeño'; ?>"
                                        class="nav__link nav__link--inside">Pequeño</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'tamanio'; ?>&s=<?php echo 'Mediano'; ?>"
                                        class="nav__link nav__link--inside">Mediano</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'tamanio'; ?>&s=<?php echo 'Grande'; ?>"
                                        class="nav__link nav__link--inside">Grande</a>
                                </li>

                            </ul>
                        </li>
                        <!-- ================================================================================================= -->
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/pelaje.svg" class="list__img">
                                <a href="adoptar.php" class="nav__link">Largo de Pelo</a>
                                <img src="assets/arrow.svg" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'cantidadDePelaje'; ?>&s=<?php echo 'Corto'; ?>"
                                        class="nav__link nav__link--inside">Pelaje Corto</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'cantidadDePelaje'; ?>&s=<?php echo 'Mediano'; ?>"
                                        class="nav__link nav__link--inside">Pelaje normal</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'cantidadDePelaje'; ?>&s=<?php echo 'Largo'; ?>"
                                        class="nav__link nav__link--inside">Mucho Pelaje</a>
                                </li>
                            </ul>
                        </li>
                        <!-- ===================================================================================================   -->
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="assets/edad.svg" class="list__img">
                                <a href="adoptar.php" class="nav__link">Edad</a>
                                <img src="assets/arrow.svg" class="list__arrow">
                            </div>
                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'edad'; ?>&s=<?php echo '1'; ?>"
                                        class="nav__link nav__link--inside">0-6 meses</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'edad'; ?>&s=<?php echo '2'; ?>"
                                        class="nav__link nav__link--inside">6-12 meses</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'edad'; ?>&s=<?php echo '3'; ?>"
                                        class="nav__link nav__link--inside">1 a 5 años</a>
                                </li>

                                <li class="list__inside">
                                    <a href="adoptar.php?f=<?php echo 'edad'; ?>&s=<?php echo '4'; ?>"
                                        class="nav__link nav__link--inside">5 años a más</a>
                                </li>
                            </ul>
                        </li>
                        <!-- ================================================================================================== -->
                    </ul>
                </div>

            </div>

            <div class="col-m-10 col-l-7">
                <h1 class="title-products">Encuentra a tu mejor amigo</h1>

                <div class="row">
                    <div class="col-xs-12">

                        <select class="select-order">
                            <option>Lo más urgente</option>
                            <option>Lo más reciente</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!--Intentanto arreglar-->
                    <?php
                    require_once 'php/obtenerMascotas.php';
                    // Obtener la IP del visitante
                    $ip = $_SERVER['REMOTE_ADDR'];
                    if ($_GET) { ?>

                        <?php
                        for ($i = 0; $i < count($mascotasDisponibles); $i++) {
                            if ($mascotasDisponibles[$i][$_GET['f']] == $_GET['s']) { ?>

                                <a href="php/registro_visita.php?indice=<?php echo $i; ?>&ip=<?php echo $ip; ?>"
                                    class="col-m-4 col-s-6 product-box">
                                    <img alt="<?php echo "mascota " . ($i + 1) ?>" width="100%"
                                        src="<?php echo "php/" . $mascotasDisponibles[$i]['url']; ?>" />
                                    <div class="offer hidden">Urgente</div>
                                    <h3>
                                        <?php echo $mascotasDisponibles[$i]['nombre']; ?>
                                    </h3>
                                    <strong class="price">Adoptar</strong>
                                </a>
                            <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                        <?php
                        for ($i = 0; $i < count($mascotasDisponibles); $i++) {
                            ?>

                            <a href="php/registro_visita.php?indice=<?php echo $i; ?>&ip=<?php echo $ip; ?>"
                                class="col-m-4 col-s-6 product-box">
                                <img alt="<?php echo "mascota " . ($i + 1) ?>" width="100%"
                                    src="<?php echo "php/" . $mascotasDisponibles[$i]['url']; ?>" />
                                <div class="offer hidden">Urgente</div>
                                <h3>
                                    <?php echo $mascotasDisponibles[$i]['nombre']; ?>
                                </h3>
                                <strong class="price">Adoptar</strong>
                            </a>

                        <?php } ?>
                    <?php } ?>
                    <!-- Intentando arreglar-->
                </div>

                <ul class="pagination">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li>...</li>
                    <li><a href="#">10</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- =========================FIN MASCOTAS============================ -->
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
    <script src="menu-mascotas.js"></script>
    <!--<script src="main.js"></script>-->
</body>

</html>