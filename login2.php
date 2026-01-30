<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-login2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>
</head>


<body>

    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Agrega Nuevos Usuarios</h2>
                <p>Aquí puedes volver al panel de administración.</p>
                <a href="admin/php/user.php">Panel de Administración</a>

            </div>
        </div>
        <form action="php/registro_usuario_be2.php" method="POST" class="formulario">
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
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Apellidos" name="apellidos">
            <input type="text" placeholder="Correo Electronico" name="correo">
            <input type="text" placeholder="Usuario" name="usuario">
            <input type="password" placeholder="Contraseña" name="contrasena">
            <p>Acepta los <a href="#" style="color:skyblue">Términos y Condiciones</a></p>
            <!--<label>
                <input type="checkbox">Aceptas los <a href="#">Terminos y Condiciones</a>
            </label>-->
            <button>Registrarse</button>
            <!-- <input type="button" value="Registrarse"> -->
        </form>
    </div>
    
    <script src="main.js"></script>
</body>

</html>