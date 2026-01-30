<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">

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
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="descripcion-mascotas.css">
    <!--Fin Cambios de diego actualizado-->
    
    <title>mascota1</title>
</head>

<body>
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
    
    <!-- -------------------------------------------FIN DEL NAVBAR---------------------------------------------------- -->

    <?php
    //echo "<br><br>Mascota seleccionada: ".$_GET['indice']."<br><br>";
    require_once 'php/obtenerMascotas.php';

    $index = $_GET['indice']; //0
    $nMascotas = count($mascotasDisponibles); //6
    $indiceInicial = 0;
    $indiceFinal = $nMascotas;

    if ($nMascotas > 4) { //Si hay mas de 4 mascotas
        $indiceInicial = $index - 2;
        $indiceFinal = $index + 3;

        $resto = 0;

        if ($indiceInicial < 0) {
            $resto = 0 - $indiceInicial;
            $indiceFinal = $indiceFinal + $resto;
            $indiceInicial = 0;
            if ($indiceFinal > $nMascotas) {
                $indiceFinal = $nMascotas;
            }
        }
        if ($indiceFinal > $nMascotas) {
            $resto = $indiceFinal - $nMascotas;
            $indiceInicial = $indiceInicial - $resto;
            $indiceFinal = $nMascotas;
            if ($indiceInicial < 0) {
                $indiceInicial = 0;
            }
        }
    }
    //echo "<br><br><br><br><br><br>Indice Actual: ".$index."<br>Indice Inicial: ".$indiceInicial."<br>Indice Final: ".$indiceFinal."<br>";
    ?>

    <div class="container">
        <div class="container-title">Características de la mascota</div>
        <main>
            <div class="container-img">
                <img src="<?php echo 'php/' . $mascotasDisponibles[$index]['url'] ?>" alt="imagen-producto" width="100%">
            </div>

            <div class="contanier-info-mascota">
                <div class="container-name">
                    <span><?php echo $mascotasDisponibles[$index]['nombre'] ?></span>
                </div>
                <div class="container-details-mascota">
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Género: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['sexo'] ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Edad: </p>
                            </div>
                            <div class="linea">
                                <p>
                                    <?php
                                    $fechaNacimiento = $mascotasDisponibles[$index]['fechaDeNacimiento'];
                                    $fechaActual = date("Y-m-d");
                                    $diff = date_diff(date_create($fechaNacimiento), date_create($fechaActual));
                                    $anios = $diff->y;
                                    $meses = $diff->m;
                                    $dias = $diff->d;

                                    if ($anios > 0) {
                                        echo $anios . " años ";
                                    }
                                    if ($meses > 0) {
                                        if ($anios > 0) {
                                            echo " , ";
                                        }
                                        echo $meses . " meses ";
                                    }
                                    if ($anios == 0 && $meses == 0) {
                                        echo $dias . " dias ";
                                    }
                                    //echo "aprox. ";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Raza: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['raza'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Historial Clínico: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['historialClinico'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Especie: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['especie'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Colores: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['colores'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Tamaño: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['tamanio'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Pelaje: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotasDisponibles[$index]['cantidadDePelaje'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Esterilización: </p>
                            </div>
                            <div class="linea">
                                <p>
                                    <?php
                                    if ($mascotasDisponibles[$index]['esterilizacion'] == "1") {
                                        echo "Si";
                                    } else {
                                        echo "No";
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-description">
                    <div class="title-description">
                        <h4>Descripción</h4>
                    </div>
                    <div class="text-description">
                        <p>
                            <?php
                            if ($mascotasDisponibles[$index]['descripcion'] == null) {
                                echo "Sin descripción";
                            } else {
                                echo $mascotasDisponibles[$index]['descripcion'];
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="botones">
                    <a href="formulario-adoptar.php?indice=<?php echo $index; ?>"><button class="btn-add-to-cart">
                            Adoptar
                        </button></a>
                    <!-- <a href="apadrinar.php"><button class="btn-add-to-cart">
                            Apadrinar
                        </button></a> -->
                </div>
            </div>
        </main>

        <section class="container-related-mascotas">
            <h2>Encuentrales un hogar</h2>
            <div class="card-list-mascotas">

                <?php 
                    $ip = $_SERVER['REMOTE_ADDR'];

                    for ($i = $indiceInicial; $i < $indiceFinal; $i++) {
                        if ($i != $index) { ?>
                            <div class="card">
                                <div class="card-img">
                                    <a href="php/registro_visita.php?indice=<?php echo $i; ?>&ip=<?php echo $ip; ?>">
                                        <img src="<?php echo "php/" . $mascotasDisponibles[$i]['url']; ?>" alt="mascota">
                                    </a>
                                </div>
                                <div class="info-card">
                                    <div class="text-mascota">
                                        <h3><?php echo $mascotasDisponibles[$i]['nombre']; ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                <?php } ?>
            </div>
        </section>
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