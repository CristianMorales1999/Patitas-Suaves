<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Cambios de diego actualizado-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style-quienes-somos.css">
        <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
        <!--Fin Cambios de diego actualizado-->

        <title>Quienes Somos</title>
    </head>

    <body>
        <!--========== SCROLL TOP ==========-->
    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!" target="_blank" class="scrolltop" id="scroll-top">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ===================Navbar========================= -->
    <!--Cambios de diego actualizado-->
    <header class="l-header" id="header">
        <div class="logo">
            <a href="index.php">
                <img src="/img/logo_mascota.png">
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
                <!-- <li>
                        <a href="formulario-adoptar.php">Formulario-Adoptar</a>
                    </li> -->
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
                <!-- AQUI HAY UN ICONO DE USUARIO CUANDO SE LOGUEA CON EXITO                 -->
                <?php
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

        <!-- =================== Primera Sección========================= -->
        <section class="general">
            <div class="general-1">
                <h2>Patitas Suaves</h2>
                <p>
                    Patitas Suaves es una organización sin fines de lucro
                    dedicada a rescatar, rehabilitar y encontrar hogares
                    responsables para animales en situación de necesidad.
                    Nuestro equipo está compuesto por amantes de los animales
                    que trabajan para asegurar que cada animal sea tratado con
                    amor, atención y respeto.
                </p>
            </div>
            <div class="general-2"></div>
        </section>

        <section class="general">
            <div class="general-3"></div>
            <div class="general-4">
                <h2>Misión y Visión</h2>
                <p>
                    Simplificar y mejorar el proceso de adopción al proporcionar
                    información completa, facilitar la comunicación, promover la
                    adopción responsable, educar y concientizar en las personas
                    a mejorar el bienestar animal en general.
                    Nuestra visión es convertirnos en el 2025 en el sistema web
                    de adopción de mascotas más reconocida a nivel nacional.
                    Nuestra búsqueda radica en cambiar la manera en que las
                    personas interactúan con los animales que se encuentran en
                    situación de desamparo, a través de esta plataforma web.

                </p>
            </div>
        </section>

        <section class="general">
            <div class="general-5">
                <h2>Nuestras Historias</h2>
                <p>
                    Todas las familias conectadas con nuestros amigos
                    peludos terminan en éxito, cada historia es diferente,
                    pero cada una tiene un denominador en común, la
                    alegría que generan nuestros peludos en cada hogar.
                </p>
            </div>
            <div class="general-6"></div>
        </section>

        <!-- =================== Carta de Presentación ================== -->

        <h1>Nuestro equipo de expertos</h1>
        <p class="descripcion">Somos estudiantes de las Universidad Nacional de
            Trujillo, motivados por encontrar hogares para nuestros amiguitos
            los animales.</p>

        <section class="card">
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="img/diego.jpg" alt>
                    <h2>Diego Ñique Baldeón</h2>
                    <p>Diseñador web</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>Siempre busco estar al tanto de las últimas tendencias y tecnologías del desarrollo web para asegurarme de que mis proyectos estén a la vanguardia. Mi conjunto de habilidades incluye lenguajes de programación como HTML, CSS, JavaScript y PHP, y también estoy familiarizado con diversos frameworks y bibliotecas, como React, Angular y Bootstrap.</p>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="#">Saber más</a>
                </div>
            </div>
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="img/deyvi.jpg" alt>
                    <h2>Deyvi Villegas</h2>
                    <p>Desarrollador front-end</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>
                        Como programador frontend, mi pasión radica en la creación de experiencias digitales cautivadoras y funcionales para los usuarios. Soy un profesional altamente motivado y apasionado por el desarrollo web, y tengo una sólida formación en tecnologías front-end clave como HTML, CSS y JavaScript.
                    </p>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="#">Saber más</a>
                </div>
            </div>
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="img/morales.jpg" alt>
                    <h2>Christian Morales</h2>
                    <p>Desarrollador back-end</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>
                        Mi conocimiento técnico abarca una variedad de lenguajes de programación, como Python, Java, Ruby o PHP, y estoy familiarizado con marcos y tecnologías populares, como Django, Spring, Ruby on Rails y Laravel. Además, cuento con experiencia en el diseño e implementación de bases de datos, tanto relacionales (MySQL, PostgreSQL) como NoSQL (MongoDB, Redis), siempre buscando el esquema más adecuado para cada proyecto.
                    </p>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="#">Saber más</a>
                </div>
            </div>
        </section>

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