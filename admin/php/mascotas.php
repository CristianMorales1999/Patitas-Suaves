<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de mascotas</title>
    <link rel="stylesheet" href="../css/style-user.css">
    <link rel="shortcut icon" href="../../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    <div class="table">
        <div class="table_header">
            <div>
                <input id="searchInput" placeholder="Buscar mascotas">
            </div>
        </div>
        <div class="table_section">
        <p>Detalles de Mascotas</p>
        <table>
                <thead>
                    <tr>
                        <th>Fecha de Registro</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Disponibilidad</th>
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
                            $nombre = $_POST["edit_nombre"];
                            $especie = $_POST["edit_especie"];
                            $raza = $_POST["edit_raza"];
                            $fecha_nacimiento = $_POST["edit_fecha_nacimiento"];
                            $sexo = $_POST["edit_sexo"];
                            $disponibilidad = $_POST["edit_disponibilidad"];

                            // Realizar la actualización en la base de datos
                            $updateQuery = "UPDATE mascota SET nombre='$nombre', especie='$especie', raza='$raza', fechaDeNacimiento='$fecha_nacimiento', sexo='$sexo', disponibilidad='$disponibilidad' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);
                        } elseif (isset($_POST["delete_id"])) {
                            $id = $_POST["delete_id"];

                            // Realizar la eliminación en la base de datos
                            $deleteQuery = "DELETE FROM mascota WHERE id='$id'";
                            mysqli_query($conexion, $deleteQuery);
                        }
                    }

                    $SQL = "SELECT * FROM mascota";
                    $dato = mysqli_query($conexion, $SQL);

                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            // Obtener el nombre de la disponibilidad basado en el valor numérico
                            $disponibilidadNombre = '';
                            if ($fila['disponibilidad'] == 1) {
                                $disponibilidadNombre = 'Disponible';
                            } elseif ($fila['disponibilidad'] == 2) {
                                $disponibilidadNombre = 'En Adopción';
                            } elseif ($fila['disponibilidad'] == 3) {
                                $disponibilidadNombre = 'Adoptada';
                            } elseif ($fila['disponibilidad'] == 4) {
                                $disponibilidadNombre = 'Reservada';
                            }
                            ?>
                            <tr class="table-row">
                                <td><?php echo $fila['fechaDeRegistro']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['especie']; ?></td>
                                <td><?php echo $fila['raza']; ?></td>
                                <td><?php echo $fila['fechaDeNacimiento']; ?></td>
                                <td><?php echo $fila['sexo']; ?></td>
                                <td><?php echo $disponibilidadNombre; ?></td>
                                <td>
                                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                    <a class="view-btn" href="../../php/obtenerMascotaActual.php?indice=<?php echo $fila['id']; ?>"><i class="fas fa-eye"></i></a>


                                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="display: inline;">
                                        <input type="hidden" name="delete_id" value="<?php echo $fila['id']; ?>">
                                        <button class="delete-btn" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr class="edit-form">
                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <input type="hidden" name="edit_id" value="<?php echo $fila['id']; ?>">
                                    <td><?php echo $fila['fechaDeRegistro']; ?></td>
                                    <td><input type="text" name="edit_nombre" value="<?php echo $fila['nombre']; ?>"></td>
                                    <td><input type="text" name="edit_especie" value="<?php echo $fila['especie']; ?>"></td>
                                    <td><input type="text" name="edit_raza" value="<?php echo $fila['raza']; ?>"></td>
                                    <td><input type="text" name="edit_fecha_nacimiento" value="<?php echo $fila['fechaDeNacimiento']; ?>"></td>
                                    <td>
                                        <select name="edit_sexo">
                                            <option value="Macho" <?php if ($fila['sexo'] == 'Macho') echo 'selected'; ?>>Macho</option>
                                            <option value="Hembra" <?php if ($fila['sexo'] == 'Hembra') echo 'selected'; ?>>Hembra</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="edit_disponibilidad">
                                            <?php
                                            $estadoMascotaQuery = "SELECT * FROM estadomascota";
                                            $estadoMascotaResult = mysqli_query($conexion, $estadoMascotaQuery);
                                            while ($estadoMascota = mysqli_fetch_array($estadoMascotaResult)) {
                                                $selected = ($estadoMascota['id'] == $fila['disponibilidad']) ? 'selected' : '';
                                                echo "<option value='" . $estadoMascota['id'] . "' $selected>" . $estadoMascota['estado'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="save-btn" type="submit"><i class="fas fa-save"></i></button>
                                        <button class="cancel-btn" type="button"><i class="fas fa-times"></i></button>
                                    </td>
                                </form>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="8">No existen registros</td>
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


