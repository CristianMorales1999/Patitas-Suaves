<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de usuarios adoptantes</title>
    <link rel="stylesheet" href="../css/style-user.css">
    <link rel="shortcut icon" href="../../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    <div class="table">
        <div class="table_header">
            <div>
                <input id="searchInput" placeholder="Buscar usuarios adoptantes">
            </div>
        </div>
        <div class="table_section">
        <p>Detalles de Usuarios Adoptantes</p>
            <table>
                <thead>
                    <tr>
                        <th>Fecha de Registro de Adopción</th>
                        <th>Nombre de Usuario</th>
                        <th>Nombre de Mascota</th>
                        <th>DNI</th>
                        <th>Número de Teléfono</th>
                        <th>Trabajo</th>
                        <th>Dirección</th>
                        <th>Estado de Adopción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    require_once "../../php/conexion_be.php";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Si se ha enviado un formulario de edición
                        if (isset($_POST["edit_id"])) {
                            $id = $_POST["edit_id"];
                            $fechaAdopcion = $_POST["edit_fecha_adopcion"];
                            $nombreUsuario = $_POST["edit_nombre_usuario"];
                            $nombreMascota = $_POST["edit_nombre_mascota"];
                            $dni = $_POST["edit_dni"];
                            $telefono = $_POST["edit_telefono"];
                            $trabajo = $_POST["edit_trabajo"];
                            $direccion = $_POST["edit_direccion"];
                            $estadoAdopcion = $_POST["edit_estado_adopcion"];

                            // Realizar la actualización en la base de datos
                            $updateQuery = "UPDATE adopcion SET fechaDeRegistro='$fechaAdopcion' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);

                            $updateQuery = "UPDATE usuario SET usuario='$nombreUsuario', dni='$dni', celular='$telefono', trabajoOcupacion='$trabajo', direccion='$direccion' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);

                            $updateQuery = "UPDATE mascota SET nombre='$nombreMascota' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);

                            $updateQuery = "UPDATE adopcion SET EstadoAdopcion_id='$estadoAdopcion' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);
                        } elseif (isset($_POST["delete_id"])) {
                            $id = $_POST["delete_id"];

                            // Realizar la eliminación en la base de datos
                            $deleteQuery = "DELETE FROM adopcion WHERE id='$id'";
                            mysqli_query($conexion, $deleteQuery);
                        }
                    }

                    $SQL = "SELECT adopcion.id, adopcion.fechaDeRegistro, usuario.usuario, mascota.nombre, usuario.dni, usuario.celular, usuario.trabajoOcupacion, usuario.direccion, adopcion.EstadoAdopcion_id
                            FROM adopcion
                            INNER JOIN usuario ON adopcion.id_usuario_adoptante = usuario.id
                            INNER JOIN mascota ON adopcion.Mascota_id = mascota.id";
                    $dato = mysqli_query($conexion, $SQL);

                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            // Obtener el nombre del estado de adopción basado en el valor numérico
                            $estadoAdopcionNombre = '';
                            if ($fila['EstadoAdopcion_id'] == 0) {
                                $estadoAdopcionNombre = 'Pendiente';
                            } elseif ($fila['EstadoAdopcion_id'] == 1) {
                                $estadoAdopcionNombre = 'Aprobado';
                            } elseif ($fila['EstadoAdopcion_id'] == 2) {
                                $estadoAdopcionNombre = 'Rechazado';
                            }
                            ?>
                            <tr class="table-row">
                                <td><?php echo $fila['fechaDeRegistro']; ?></td>
                                <td><?php echo $fila['usuario']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['dni']; ?></td>
                                <td><?php echo $fila['celular']; ?></td>
                                <td><?php echo $fila['trabajoOcupacion']; ?></td>
                                <td><?php echo $fila['direccion']; ?></td>
                                <td><?php echo $estadoAdopcionNombre; ?></td>
                                <td>
                                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="display: inline;">
                                        <input type="hidden" name="delete_id" value="<?php echo $fila['id']; ?>">
                                        <button class="delete-btn" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr class="edit-form">
                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <input type="hidden" name="edit_id" value="<?php echo $fila['id']; ?>">
                                    <td><input type="date" name="edit_fecha_adopcion" value="<?php echo $fila['fechaDeRegistro']; ?>"></td>
                                    <td><input type="text" name="edit_nombre_usuario" value="<?php echo $fila['usuario']; ?>"></td>
                                    <td><input type="text" name="edit_nombre_mascota" value="<?php echo $fila['nombre']; ?>"></td>
                                    <td><input type="text" name="edit_dni" value="<?php echo $fila['dni']; ?>"></td>
                                    <td><input type="text" name="edit_telefono" value="<?php echo $fila['celular']; ?>"></td>
                                    <td><input type="text" name="edit_trabajo" value="<?php echo $fila['trabajoOcupacion']; ?>"></td>
                                    <td><input type="text" name="edit_direccion" value="<?php echo $fila['direccion']; ?>"></td>
                                    <td>
                                        <select name="edit_estado_adopcion">
                                            <option value="0" <?php if ($fila['EstadoAdopcion_id'] == 0) echo 'selected'; ?>>Pendiente</option>
                                            <option value="1" <?php if ($fila['EstadoAdopcion_id'] == 1) echo 'selected'; ?>>Aprobado</option>
                                            <option value="2" <?php if ($fila['EstadoAdopcion_id'] == 2) echo 'selected'; ?>>Rechazado</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="save-btn" type="submit"><i class="fas fa-save"></i></button>
                                        <button class="cancel-btn"><i class="fas fa-times"></i></button>
                                    </td>
                                </form>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="9">No existen registros</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <a class="panel-control" href="page.php">Volver al Panel de Control</a>
    </div>
    <script>
        // Obtener los botones de edición y agregar eventos de clic
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Obtener la fila padre del botón
                const row = button.closest('.table-row');
                // Ocultar la fila actual
                row.style.display = 'none';
                // Mostrar el formulario de edición correspondiente
                const editForm = row.nextElementSibling;
                editForm.style.display = 'table-row';
            });
        });

        // Obtener los botones de cancelar y agregar eventos de clic
        const cancelButtons = document.querySelectorAll('.cancel-btn');
        cancelButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Obtener el formulario de edición padre del botón
                const editForm = button.closest('.edit-form');
                // Ocultar el formulario de edición
                editForm.style.display = 'none';
                // Mostrar la fila correspondiente
                const row = editForm.previousElementSibling;
                row.style.display = 'table-row';
            });
        });

        // Obtener el campo de entrada de búsqueda
        const searchInput = document.getElementById('searchInput');

        // Agregar un evento de entrada al campo de búsqueda
        searchInput.addEventListener('input', function () {
            const filter = searchInput.value.toUpperCase();
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');

            // Iterar sobre las filas de la tabla y ocultar las que no coincidan con la búsqueda
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                if (!row.classList.contains('edit-form')) {
                    const cells = row.getElementsByTagName('td');
                    let found = false;
                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const cellValue = cell.textContent || cell.innerText;
                            if (cellValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }
                    row.style.display = found ? 'table-row' : 'none';
                }
            }
        });
    </script>
</body>
</html>
