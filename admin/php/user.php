<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de usuarios</title>
    <link rel="stylesheet" href="../css/style-user.css">
    <link rel="shortcut icon" href="../../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    <div class="table">
        <div class="table_header">
            <div>
                <input id="searchInput" placeholder="Buscar usuarios">
            </div>
        </div>
        <div class="table_section">
        <p>Detalles de Usuarios</p>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Estado</th>
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
                            $apellidos = $_POST["edit_apellidos"];
                            $correo = $_POST["edit_correo"];
                            $usuario = $_POST["edit_usuario"];
                            $rol = $_POST["edit_rol"];
                            $EstadoUsuario_id = $_POST["edit_EstadoUsuario_id"];

                            // Realizar la actualización en la base de datos
                            $updateQuery = "UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', correo='$correo', usuario='$usuario', rol='$rol', EstadoUsuario_id='$EstadoUsuario_id' WHERE id='$id'";
                            mysqli_query($conexion, $updateQuery);
                        } elseif (isset($_POST["delete_id"])) {
                            $id = $_POST["delete_id"];

                            // Realizar la eliminación en la base de datos
                            $deleteQuery = "DELETE FROM usuario WHERE id='$id'";
                            mysqli_query($conexion, $deleteQuery);
                        }
                    }

                    $SQL = "SELECT * FROM usuario";
                    $dato = mysqli_query($conexion, $SQL);

                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            // Obtener el nombre del rol basado en el valor numérico
                            $EstadoUsuario_idNombre = '';
                            if ($fila['EstadoUsuario_id'] == 1) {
                                $EstadoUsuario_idNombre = 'Activo';
                            } elseif ($fila['EstadoUsuario_id'] == 2) {
                                $EstadoUsuario_idNombre = 'Inactivo';
                            }

                            $rolNombre = '';
                            if ($fila['rol'] == 0) {
                                $rolNombre = 'Usuario';
                            } elseif ($fila['rol'] == 1) {
                                $rolNombre = 'Admin';
                            }

                            // Obtener la ruta de la imagen del usuario utilizando el id de la colección "imagen"
                            $id_usuario = $fila['id'];
                            $imagen_query = "SELECT url FROM imagen WHERE Usuario_id='$id_usuario'";
                            $imagen_result = mysqli_query($conexion, $imagen_query);
                            $ruta_imagen = '../../php/';
                            if (mysqli_num_rows($imagen_result) > 0) {
                                $imagen_fila = mysqli_fetch_array($imagen_result);
                                $ruta_imagen = $ruta_imagen.$imagen_fila['url'];
                            }else{
                                $ruta_imagen = '../../img/person.jpg';
                            }

                            ?>
                            <tr class="table-row">
                                <td><?php echo $fila['fechaDeRegistro']; ?></td>
                                <td>
                                    <?php if (!empty($ruta_imagen)): ?>
                                        <img src="<?php echo $ruta_imagen; ?>" alt="Imagen de usuario" style="max-width: 100px;">
                                    <?php else: ?>
                                        Imagen no encontrada
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['apellidos']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['usuario']; ?></td>
                                <td><?php echo $rolNombre; ?></td>
                                <td><?php echo $EstadoUsuario_idNombre; ?></td>
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
                                    <td><?php echo $fila['fechaDeRegistro']; ?></td>
                                    <td><img src="<?php echo $ruta_imagen; ?>" alt="Imagen de usuario" style="max-width: 100px;"></td>
                                    <td><input type="text" name="edit_nombre" value="<?php echo $fila['nombre']; ?>"></td>
                                    <td><input type="text" name="edit_apellidos" value="<?php echo $fila['apellidos']; ?>"></td>
                                    <td><input type="text" name="edit_correo" value="<?php echo $fila['correo']; ?>"></td>
                                    <td><input type="text" name="edit_usuario" value="<?php echo $fila['usuario']; ?>"></td>
                                    <td>
                                        <select name="edit_rol">
                                            <option value="0" <?php if ($fila['rol'] == 0) echo 'selected'; ?>>Usuario</option>
                                            <option value="1" <?php if ($fila['rol'] == 1) echo 'selected'; ?>>Admin</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select name="edit_EstadoUsuario_id">
                                            <option value="1" <?php if ($fila['EstadoUsuario_id'] == 1) echo 'selected'; ?>>Activo</option>
                                            <option value="2" <?php if ($fila['EstadoUsuario_id'] == 2) echo 'selected'; ?>>Inactivo</option>
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
        <a class="add_new" href="../../login2.php">+ Añadir Nuevo</a>
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







