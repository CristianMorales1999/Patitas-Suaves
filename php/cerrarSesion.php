<?php
    session_start(); // Iniciar la sesión

    // Realizar operaciones con la sesión
    
    session_destroy(); // Destruir la sesión actual
    
    // Limpiamos también los datos de la sesión actual
    $_SESSION = array();
    
    // Redirigir a otra página después de destruir la sesión
    header("Location: ../index.php");
    exit;
    
?>