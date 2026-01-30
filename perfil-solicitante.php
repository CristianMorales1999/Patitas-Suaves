<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="descripcion-mascotas.css">
    <title>perfil solicitante</title>
</head>

<body>
    <!-- ===================Navbar========================= -->
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
                session_start();
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
    <!-- -------------------------------------------FIN DEL NAVBAR---------------------------------------------------- -->
    <div class="container">
        <div class="container-title">Perfil del usuario solicitante</div>

        <main>
            <div class="container-img">
                <img src="img/producto1.jpg" alt="imagen-producto">
            </div>

            <div class="contanier-info-mascota">
                <div class="container-details-mascota">
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Nombres: </p>
                            </div>
                            <div class="linea">
                                <p>Nombres completos</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Apellidos: </p>
                            </div>
                            <div class="linea">
                                <p>apellidos completos</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>sexo: </p>
                            </div>
                            <div class="linea">
                                <p>binario</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Correo: </p>
                            </div>
                            <div class="linea">
                                <p>pepito@xd.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>teléfono: </p>
                            </div>
                            <div class="linea">
                                <p>99999999</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>ocupacion: </p>
                            </div>
                            <div class="linea">
                                <p>estudiante</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>estado civil: </p>
                            </div>
                            <div class="linea">
                                <p>viudo</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>mascotas antes: </p>
                            </div>
                            <div class="linea">
                                <p>si o no</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>mascotas ahora: </p>
                            </div>
                            <div class="linea">
                                <p>si o no</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>lugar de residencia: </p>
                            </div>
                            <div class="linea">
                                <p>la libertad, trujillo, el porvenir</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>direccion domicilio: </p>
                            </div>
                            <div class="linea">
                                <p>calle o residencia</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-description">
                    <div class="title-description">
                        <h4>Motivo</h4>
                    </div>
                    <div class="text-description">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptates repellendus
                            exercitationem earum architecto sed rerum, cum ipsa recusandae aliquid quasi officiis
                            commodi praesentium dolor quisquam excepturi consectetur eum vel!
                        </p>
                    </div>
                </div>
                <div class="botones">
                    <a href="formulario-adoptar.php"><button class="btn-add-to-cart">
                            Confirmar
                        </button></a>
                    <a href="apadrinar.html"><button class="btn-add-to-cart">
                            Rechazar
                        </button></a>
                </div>
            </div>
        </main>

    </div>

    <script>
        src = "https://kit.fontawesome.com/81581fb069.js"
        crossorigin = "anonymous"
    </script>

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
                        <li><a href="quienes-somos.html">¿Quiénes Somos?</a></li>
                        <li><a href="mascotas.html">Mascotas</a></li>
                        <li><a href="adoptar.php">Adoptar</a></li>
                        <li><a href="dar-adopcion.php">Dar Adopción</a></li>
                        <li><a href="refugios.html">Refugios</a></li>
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
    <script src="mascota1.js"></script>
</body>

</html>