<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Cambios de diego actualizado-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style-refugios.css">
    <!--Fin Cambios de diego actualizado-->
    
    <title>Refugios</title>
</head>

<body>

    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!" target="_blank" class="scrolltop" id="scroll-top">
        <i class="fab fa-whatsapp"></i>
    </a>
    <!-- ===================Navbar========================= -->
    <!--Cambios de diego actualizado-->
    <header>
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
    
    <!-- ===================== Refugios ======================== -->        

    <section id="refugios">
        <div class="title-text">
            <p>NUESTROS REFUGIOS</p>
            <h2>PET SOS Refugio Animal</h2>
            <img src="img/refugio.jpg" alt="">
        </div>
        <div class="service-box">
            <div class="single-service">
                <img src="img/refugio1.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Pequeña</h3>
                    <hr>
                    <p>Pequeña fue una perrita callejera rescatado por un buen samaritano y llevado a nuestro refugio.</p>
                </div>
            </div>
            <div class="single-service">
                <img src="img/refugio2.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Dina</h3>
                    <hr>
                    <p>Dina fue abandonada en una caja en la calle, alguien la encontró y la llevó a nuestro refugio.</p>
                </div>
            </div>
            <div class="single-service">
                <img src="img/refugio3.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Calambre</h3>
                    <hr>
                    <p>Sobrevivió a un incendio y fue rescatado por bomberos, quienes lo trajeron a nuestro refugio.</p>
                </div>
            </div>
            <div class="single-service">
                <img src="img/refugio4.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Rex</h3>
                    <hr>
                    <p> Perdido durante un haico, fue encontrado por una familia preocupada y llevado a nuestro refugio.</p>
                </div>
            </div>
            <div class="single-service">
                <img src="img/refugio5.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Cuta</h3>
                    <hr>
                    <p>Maltratada y abandonada, fue encontrada en un estado deplorable y traída a nuestro refugio.</p>
                </div>
            </div>
            <div class="single-service">
                <img src="img/refugio6.jpg" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Suki</h3>
                    <hr>
                    <p>Abandonada en un parque, fue encontrada por rescatistas y llevada a nuestro refugio.</p>
                </div>
            </div>
    </section>
    
    <!-- ============================ Mapa ============================== -->

    <section class="map">
        <h1>UBICACIÓN DE PET SOS</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11172.629322363066!2d-79.03920845777276!3d-8.08914333956691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3de7976232fd%3A0xccbf1dd26d79a4a5!2sPlaza%20De%20Armas%20De%20La%20Esperanza!5e0!3m2!1ses-419!2spe!4v1687310220822!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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