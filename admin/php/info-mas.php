<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style-info.css">
</head>
<body>
<?php
    $mascotaActual = $_SESSION['mascotaActual'];
?>

<div class="container">
        <div class="container-title">Características de la mascota</div>
        <main>
            <div class="container-img">
                <img src="<?php echo '../../php/' . $mascotaActual['url'] ?>" alt="imagen-producto" width="100%">
            </div>

            <div class="contanier-info-mascota">
                <div class="container-name">
                    <span><?php echo $mascotaActual['nombre'] ?></span>
            </div>
            <div class="container-details-mascota">
                <div class="form-group">
                    <div class="caracteristicas">
                         <div class="subtitle">
                             <p>Género: </p>
                        </div>
                        <div class="linea">
                             <p><?php echo $mascotaActual['sexo'] ?></p>
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
                                    $fechaNacimiento = $mascotaActual['fechaDeNacimiento'];
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
                                <p><?php echo $mascotaActual['raza'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Historial Clínico: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotaActual['historialClinico'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Especie: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotaActual['especie'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Colores: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotaActual['colores'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Tamaño: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotaActual['tamanio'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="caracteristicas">
                            <div class="subtitle">
                                <p>Pelaje: </p>
                            </div>
                            <div class="linea">
                                <p><?php echo $mascotaActual['cantidadDePelaje'] ?></p>
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
                                    if ($mascotaActual['esterilizacion'] == "1") {
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
                            if ($mascotaActual['descripcion'] == null) {
                                echo "Sin descripción";
                            } else {
                                echo $mascotaActual['descripcion'];
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="botones">
                    <a href="mascotas.php"><button class="btn-add-to-cart">
                            Buscar Otra Mascota
                        </button></a>
                </div>
            </div>
        </main>
</body>
</html>