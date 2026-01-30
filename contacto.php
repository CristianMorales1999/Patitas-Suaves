<?php session_start();
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
    <link rel="stylesheet" href="style-contacto.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!--Fin Cambios de diego actualizado-->

    <title>Contacto</title>
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!" target="_blank" class="scrolltop" id="scroll-top">
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
                <!-- <li>
                    <a href="login.php" class="active">Iniciar Sesión</a>
                </li> -->
            </ul>
        </nav>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>

    <!-- ========================== Contacto ============================ -->
    <section>
        <div class="contactForm">
            <div class="form">
                <div class="texto">
                    <h2>¡Hablemos!</h2>
                    <p>"¡Conéctate con nosotros! Estamos aquí para escucharte y responder cualquier pregunta o inquietud que puedas tener. Nuestro equipo de atención al cliente está listo para brindarte asistencia personalizada y orientación en cada paso del camino."</p>
                </div>

                <form action="">
                    <div class="inputBox">
                        <label for="">Tu nombre</label>
                        <input type="text" placeholder="Nombre...">
                    </div>
                    <div class="inputBox">
                        <label for="">Tu email</label>
                        <input type="text" placeholder="Email...">
                    </div>
                    <div class="inputBox">
                        <label for="">Teléfono/Celular</label>
                        <input type="text" placeholder="Número...">
                    </div>
                    <div class="inputBox">
                        <label for="">Tu mensaje</label>
                        <textarea name="" id="" cols="30" rows="5" placeholder="Mensaje..."></textarea>
                    </div>
                    <input type="submit" value="Enviar Mensaje">
                </form>
            </div> 
            <div class="info">
                <div class="imgBox">
                    <img src="img/email.png" alt="">
                </div>
                <div class="textBox">
                    <div class="infoContact">
                        <ion-icon name="map"></ion-icon><p>Universidad Nacional De Trujillo, La Libertad, Perú</p>
                    </div>
                    <div class="infoContact">
                        <ion-icon name="call"></ion-icon><p>+51 987933121</p>
                    </div>
                    <div class="infoContact">
                        <ion-icon name="mail"></ion-icon><p>T452700120@unitru.edu.pe</p>
                    </div>
                </div>
                <div class="rrss">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
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
    <script src="main.js"></script>
</body>
</html>