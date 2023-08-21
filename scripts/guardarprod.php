<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

// Incluye el SDK de AWS
require '../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$correcto = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    // Verifica si el archivo es una imagen
    if ($_FILES["archivo"]["type"] === "image/jpeg" || $_FILES["archivo"]["type"] === "image/png") {
        // Verifica el tamaño del archivo
        $maxSize = 5 * 1024 * 1024; // 5MB
        if ($_FILES["archivo"]["size"] > $maxSize) {
            echo "El archivo es demasiado grande. Por favor, seleccione un archivo de máximo 5MB.";
        } else {
            // Datos del archivo subido
            $archivoTemporal = $_FILES["archivo"]["tmp_name"];
            $nombreArchivo = $_FILES["archivo"]["name"];

            // Configura el cliente de Amazon S3 con tus credenciales
            $credentials = [
                'key'    => 'AKIA5BEVIMTOKSAMIQX7',
                'secret' => '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',
            ];

            $s3Client = new S3Client([
                'version'     => 'latest',
                'region'      => 'us-east-2',
                'credentials' => $credentials,
            ]);

            // Ruta de destino en S3 donde quieres guardar la imagen
            $destinoEnS3 = 'imagenes/'.$nombreArchivo;

            // Intenta subir la imagen a S3
            try {
                $result = $s3Client->putObject([
                    'Bucket' => 'carnitaschapbucket',
                    'Key'    => $destinoEnS3,
                    'SourceFile' => $archivoTemporal,
                ]);

                // URL completa de la imagen en S3
                $img = 'https://carnitaschapbucket.s3.us-east-2.amazonaws.com/' . $destinoEnS3;

                // Obtén los demás datos del formulario
                $nombre = $_POST['nombre'];
                $disponibilidad = $_POST['disponibilidad'];
                $precioapp = $_POST['precioapp'];
                $preciocom = $_POST['preciocom'];
                $tipoprod = $_POST['tipoprod'];
                $description = $_POST['description'];

                // Verifica la disponibilidad y ajusta los precios si es necesario
                if ($disponibilidad === 'Rapido' && empty($preciocom)) {
                    $preciocom = null;
                } elseif ($disponibilidad === 'Comedor' && empty($precioapp)) {
                    $precioapp = null;
                }

                // Prepara y ejecuta la consulta para insertar los datos en la base de datos
                $insert = $pdo->prepare("INSERT INTO PRODUCTOS (nombre, precio_app, precio_com, tipo, descripcion, disponibilidad, `status`, img) VALUES (:nom, :papp, :pcom, :tipo, :descr, :dispon, 'Activo', :img)");

                $resultado = $insert->execute(array(
                    'nom' => $nombre,
                    'papp' => $precioapp,
                    'pcom' => $preciocom,
                    'tipo' => $tipoprod,
                    'descr' => $description,
                    'dispon' => $disponibilidad,
                    'img' => $img
                ));

                if ($resultado) {
                    $correcto = true;
                }
            } catch (S3Exception $e) {
                // En caso de error al subir la imagen a Amazon S3, captura la excepción y muestra un mensaje
                echo "Error al subir la imagen a Amazon S3: {$e->getMessage()}";
            }
        }
    } else {
        echo "Tipo de archivo no válido. Solo se permiten archivos de imagen (JPEG/PNG).";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Validacion prod</title>
</head>
<body class="py-3">
    <div class="container">
        <div class="row container">
            <div class="col">
                <?php if ($correcto) { ?>
                    <h1>¡Producto creado correctamente!</h1>
                <?php } else { ?>
                    <h1>Producto no creado...</h1>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="../views/prodcrud.php">Regresar</a>
            </div>
        </div>
    </div>
</body>
</html>