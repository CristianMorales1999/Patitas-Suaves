<?php session_start();
    if ( $_SESSION ) {
        //Si un usuario ha iniciado sesion
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style-editar-perfil.css">
    <title>Mi perfil</title>
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
            </ul>
        </nav>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
    <!-- -------------------------------------------FIN DEL NAVBAR---------------------------------------------------- -->
    <!-- ========================== Contacto ============================ -->
    <section class="formulario">
        <div class="container">
            
            <div class="form-image">
                <!-- DIV DE LA FOTO DEL USUARIO -->
                <div class="avatar-user">
                    <?php 
                        if($_SESSION['url']==null){ 
                    ?>
                        <i class='bx bxs-user'></i>
                    <?php
                        }
                        else{
                     ?>
                        <img src="<?php echo 'php/' . $_SESSION['url'] ?>" alt="Usuario sin foto" width="100%">
                    <?php
                        }
                     ?>
                </div>
                <!-- -------------------------- -->
            </div>
            <div class="form">

                <form action="php/actualizacion_datos_usuario.php" id="form" method="POST" enctype="multipart/form-data"><!--Inicio de formulario-->

                    <div class="form-header">
                        <div>
                            <h1>Mi perfil</h1>
                        </div>
                        <div>
                            <div>
                                <select class="select-order" name="edit" id="edit" onchange="redirectToPage()">
                                    <option value="">Configuración</option>
                                    <option value="ver-perfil.php">Ver Perfil</option>
                                    <option value="editar-perfil.php">Editar Perfil</option>
                                    <option value="cambiar-password.php">Cambiar Contraseña</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="firstname">Foto de perfil</label>
                            <input type="file" name="foto" accept="image/png, image/jpeg">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="firstname">Nombres</label>
                            <input type="text" name="nombre" id="name" value="<?php echo $_SESSION['nombre'];?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="lastname">Apellidos</label>
                            <input type="text" name="apellidos" id="lastname" value="<?php echo $_SESSION['apellidos'];?>">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="lastname">Nombre de Usuario</label>
                            <input type="text" name="usuario" id="user" value="<?php echo $_SESSION['usuario'];?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="correo" id="correo" value="<?php echo $_SESSION['correo'];?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="number">Número de Contacto</label>
                            <input type="tel" name="telefono" id="numero" value="<?php echo $_SESSION['celular'];?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="text">Sexo</label>
                            <select class="gender__option" name="sexo" id="sexo">
                                <option value="">Seleccione su género</option>

                                <option value="Hombre"<?php if ($_SESSION['sexo'] === 'Hombre') echo ' selected'; ?>>Hombre</option>
                                <option value="Mujer"<?php if ($_SESSION['sexo']  === 'Mujer') echo ' selected'; ?>>Mujer</option>
                            </select>
                        </div>
                    </div>

                    <div class="continue-button">
                        <button type="submit">Guardar</button>
                        <p class="warnings" id="warnings"></p>
                    </div>
                </form>
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
                        <li><a href="contacto.php">Contacta con nosotros</a></li>
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
                        <li><a href="#">Refugios</a></li>
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
    <script src="option-perfil.js"></script>
    <script src="user.js"></script>
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