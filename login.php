<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Cambios de diego actualizado-->
    <link rel="stylesheet" href="style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--Fin Cambios de diego actualizado-->

    <title>Login</title>
</head>


<body>

    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a Patitas Suaves</h2>
                <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>
        <form action="php/registro_usuario_be.php" method="POST" class="formulario" id="form">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" placeholder="Nombre" name="nombre" id="name">
            <input type="text" placeholder="Apellidos" name="apellidos" id="lastname">
            <input type="text" placeholder="Correo Electronico" name="correo" id="email">
            <input type="text" placeholder="Usuario" name="usuario" id="user">
            <input type="password" placeholder="Contraseña" name="contrasena" id="password">
            <label class="formulario__label">
                <input class="input__checkbox" type="checkbox" id="terminos">
                <p>Acepto los <a href="terminos-condiciones.html" target="_blank" style="color:skyblue">Términos y Condiciones</a></p>
            </label>
            <button type="submit">Registrarse</button>
            <p class="warnings" id="warnings"></p>
        </form>
    </div>
    <div class="container-form sign-in">
        <form action="php/login_usuario_be.php" method="POST" class="formulario">
            <h2 class="create-account">Iniciar Sesion</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
            <input type="text" placeholder="Correo Electronico" name="correo">
            <input type="password" placeholder="Contraseña" name="contrasena">
            <p><a href="" style="color:white">¿Has olvidado tu contraseña?</a></p>
            <button>Iniciar Sesión</button>
            <!-- <input type="button" value="Iniciar Sesion"> -->
        </form>
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                <button class="sign-in-btn">Registrarse</button>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="login.js"></script>
</body>

</html>