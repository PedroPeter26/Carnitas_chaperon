<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$tiposQuery = $pdo->query("SELECT * FROM TIPOS");
$tipos = $tiposQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body class="py-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Nuevo producto:</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <form id="productform" class="row g-3" method="POST" action="../scripts/guardarprod.php" autocomplete="off" enctype="multipart/form-data">

                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required autofocus>
                    </div>

                    <div class="col-md-4">
                        <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                        <select name="disponibilidad" id="disponibilidad" class="form-control" required>
                            <option value="Ambos">Ambos</option>
                            <option value="Comedor">Comedor</option>
                            <option value="Rapido">Rápido</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="precioapp" class="form-label">Precio aplicación:</label>
                        <input type="text" name="precioapp" id="precioapp" class="form-control" onkeydown="return limitarInput(event)">
                    </div>

                    <div class="col-md-2">
                        <label for="preciocom" class="form-label">Precio comedor:</label>
                        <input type="text" name="preciocom" id="preciocom" class="form-control" onkeydown="return limitarInput(event)">
                    </div>

                    <div class="col-md-4">
                        <label for="tipoprod" class="form-label">Tipo:</label>
                        <select name="tipoprod" id="tipoprod" class="form-control" required>
                            <?php
                            foreach ($tipos as $tipo) {
                                echo "<option value='{$tipo['id_tipo']}'>{$tipo['nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label for="description" class="form-label">Descripción:</label>
                        <textarea name="description" id="description" class="form-control" rows="5" maxlength="300" required></textarea>
                    </div>

                    <div class="col-md-4">
                        <label for="archivo" class="form-label">Imagen:</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" accept="image/*" onchange="validateFile(this)" required>
                    </div>

                    <script>
                        function validateFile(input) {
                            const maxSize = 5 * 1024 * 1024;
                            if (input.files && input.files[0]) {
                                if (input.files[0].size > maxSize) {
                                    alert("El archivo es demasiado grande. Por favor, seleccione un archivo de máximo 5MB.");
                                    input.value = '';
                                    return;
                                }

                                const allowedTypes = ["image/jpeg", "image/png"];
                                if (!allowedTypes.includes(input.files[0].type)) {
                                    alert("Tipo de archivo no válido. Solo se permiten archivos de imagen (JPEG/PNG).");
                                    input.value = '';
                                }
                            }
                        }
                    </script>

                    <div class="col-md-12">
                        <a class="btn btn-danger" href="prodcrud.php">Regresar</a>
                        <button type="submit" class="btn btn-primary" name="crear">Crear producto</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function limitarInput(event) {
            var keyCode = event.keyCode || event.which;

            if ((keyCode >= 48 && keyCode <= 57) ||
                (keyCode >= 96 && keyCode <= 105) ||
                keyCode === 190) {
                return true;
            }

            if ([8, 9, 35, 36, 37, 38, 39, 40, 46].includes(keyCode)) {
                return true;
            }

            event.preventDefault();
            return false;
        }
    </script>

    <script>
        function actualizarCampos() {
            const disponibilidadSelect = document.getElementById("disponibilidad");
            const precioAppInput = document.getElementById("precioapp");
            const precioComInput = document.getElementById("preciocom");

            const seleccion = disponibilidadSelect.value;

            precioAppInput.removeAttribute("required");
            precioComInput.removeAttribute("required");
            precioAppInput.removeAttribute("readonly");
            precioComInput.removeAttribute("readonly");
            precioAppInput.value = "";
            precioComInput.value = "";

            if (seleccion === "Ambos") {
                precioAppInput.setAttribute("required", true);
                precioComInput.setAttribute("required", true);
            } else if (seleccion === "Rapido") {
                precioAppInput.setAttribute("required", true);
                precioComInput.setAttribute("readonly", true);
            } else if (seleccion === "Comedor") {
                precioComInput.setAttribute("required", true);
                precioAppInput.setAttribute("readonly", true);
            }
        }

        const disponibilidadSelect = document.getElementById("disponibilidad");
        disponibilidadSelect.addEventListener("change", actualizarCampos);

        const form = document.getElementById("productform");
        form.addEventListener("submit", function(event) {
            const precioAppInput = document.getElementById("precioapp");
            const precioComInput = document.getElementById("preciocom");

            const precioApp = parseFloat(precioAppInput.value);
            const precioCom = parseFloat(precioComInput.value);

            if (precioApp <= 0 || precioCom <= 0) {
                alert("Los valores de precio deben ser mayores a 0.");
                event.preventDefault(); // Detener el envío del formulario
            }
        });

        actualizarCampos();
    </script>

</body>

</html>