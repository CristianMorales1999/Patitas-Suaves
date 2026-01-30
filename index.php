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
    <meta name="theme-color" content="#6A205F">
    <meta name="twitter:card" content="summary">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="usuario-estilo.css">
    <!--Fin Cambios de diego actualizado-->

    <title>Patitas Suaves</title>
</head>

<body>
    <!--========== SCROLL TOP ==========-->
    <a href="https://api.whatsapp.com/send?phone=987933121&text=Hola%20quisiera%20reservar%20un%20turno!" target="_blank" class="scrolltop" id="scroll-top">
        <i class="fab fa-whatsapp"></i>
    </a>

    <section id="home" class="banner">

        <!--Cambios de diego actualizado-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="index.php"> <img src="img/logo_mascota.png" class="logo" alt="logo"></a>

                <div class="nav__menu" id="nav-menu">

                    <ul class="nav__list">

                        <li class="nav__item"><a href="quienes-somos.php" class="nav__link">¿Quiénes Somos?</a></li>
                        <li class="nav__item"><a href="adoptar.php" class="nav__link">Adoptar</a></li>
                        <?php
                            if ($_SESSION) {?>
                                <li><a href="dar-adopcion.php">Dar En Adopción</a></li> 
                        <?php } ?>

                        <li class="nav__item"><a href="refugios.php" class="nav__link">Refugios</a></li>
                        <li class="nav__item"><a href="contacto.php" class="nav__link">Contacto</a></li>

                        <!-- AQUI HAY UN ICONO DE USUARIO CUANDO SE LOGUEA CON EXITO                 -->
                        <?php
                        if ($_SESSION) {
                            ?>
                            <li class="nav__user">                                
                                <a href="#" class="icono">
                                    <i class='bx bxs-user-circle' style='color:#fff'></i>
                                </a>                                
                                <ul class="list__show">
                                    <li class="user__inside" >
                                        <a href="ver-perfil.php">Ver Perfil</a>
                                    </li>
                                    <li class="user__inside" >
                                        <a href="php/cerrarSesion.php">Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav__item"><a href="login.php" class="nav__link active-link">Iniciar Sesión</a></li>
                            <?php
                        } ?>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='fas fa-bars'></i>
                </div>
            </nav>
        </header>
        <!--Fin Cambios de diego actualizado-->

        <section class="carrusel">
            <div class="container-carousel">
                <div class="carruseles" id="slider">
                    <section class="slider-section">
                        <img src="img/1.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/2.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/3.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/4.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/5.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/6.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/7.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/8.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/9.jpg" style="filter: brightness(0.4);">
                    </section>
                    <section class="slider-section">
                        <img src="img/10.jpg" style="filter: brightness(0.4);">
                    </section>
                </div>

            </div>
        </section>

    </section>

    <div class="content">
        <div class="title">
            <div class="slider">
                <div>A la tuya</div>
                <div>Y suma felicidad</div>
                <div>Cambia una vida</div>
            </div>
        </div>
        <p>Registramos A Todos Los Animales Domésticos, ¡No Esperes Más Y Adopta Tu Mascota Ideal!</p>
        <a class="reserva" href="#turnos">RESERVA UN TURNO</a>
        <div class="btn-left"><i class='bx bx-chevron-left'></i></div>
        <div class="btn-right"><i class='bx bx-chevron-right'></i></div>
    </div>


    <!---------------------------- perdido ----------------------------->

    <section class="perdido">
        <div class="header-content container">

            <h1>¿Encontraste una mascota?</h1>
            <p>
                ¡Encontraste una mascota perdida! Estamos aquí para ayudarte. En nuestro equipo de rescate de mascotas, nos dedicamos a reunir a los animales perdidos con sus familias amorosas. Si te has encontrado con una mascota sin hogar o extraviada, estás en el lugar correcto.

                Nuestro objetivo es brindar un refugio seguro y amoroso para todas las mascotas mientras trabajamos incansablemente para encontrar a sus dueños. Entendemos lo estresante que puede ser perder a un compañero peludo y estamos comprometidos a hacer todo lo posible para reunir a las familias con sus seres queridos de cuatro patas.

                ¡Gracias por considerar ser parte de nuestro esfuerzo de rescate! Tu ayuda puede marcar la diferencia en la vida de una mascota perdida y ayudar a que encuentre su camino de regreso a casa.
            </p>
            <a href="dar-adopcion.php" class="btn-1">Reportar</a>
        </div>
    </section>

    <!-- =================== Sección Noticias ====================== -->

    <!--   Tarjetas-->
    <div class="title-cards">
        <h2>Novedades & actualidad</h2>
    </div>
    <div class="container-card">

        <div class="card">
            <figure>
                <img src="img/noticia1.jpeg" alt="">
            </figure>
            <div class="contenido-card">
                <h3>Conoce las razones por las que tu gato se escapa de casa</h3>
                <p>Nuestro compañero felino muchas veces se escapa de nuestro hogar y puede tomar muchos días encontrarlo. Conoce aquí lo que viven estas mascotas cuando se van.</p>
                <a href="https://larepublica.pe/mascotas/2023/06/06/por-que-un-gato-se-va-de-la-casa-y-no-vuelve-nunca-mas-esta-es-la-verdadera-razon-nspe-123252">Leer Más</a>
            </div>
        </div>
        <div class="card">
            <figure>
                <img src="img/noticia2.jpeg" alt="">
            </figure>
            <div class="contenido-card">
                <h3>¿Cómo cuidar y alimentar a estos animalitos?</h3>
                <p>Tener un hámster como mascota se está volviendo más habitual entre las familias, sin embargo, la información sobre su cuidado sigue siendo muy escasa.
                </p>
                <a href="https://www.elespanol.com/como/cuidar-hamster-necesitas-saber/391461144_0.php">Leer Más</a>
            </div>
        </div>
        <div class="card">
            <figure>
                <img src="img/noticia3.png" alt="">
                <div class="contenido-card">
                    <h3>¿Cómo mantener a tus mascotas a salvo de la mala calidad del aire y el humo de los incendios?</h3>
                    <p>La exposición al aire contaminado puede tener un profundo impacto en la salud de nuestras mascotas, provocando problemas respiratorios, alergias e incluso exacerbando afecciones existentes como el asma.</p>
                    <a href="https://cnnespanol.cnn.com/2023/06/09/el-humo-de-los-incendios-es-malo-para-las-mascotas-trax/">Leer Más</a>
                </div>
        </div>
    </div>
    <!--Fin   Tarjetas-->


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