<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$id = $_POST['id'];
$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE producto_id = :id");
$query->execute(['id' => $id]);
$row = $query->fetch(PDO::FETCH_ASSOC);

require '../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$correcto = false;

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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

    $img = ''; // Variable para almacenar la URL de la imagen

    // Lógica para manejar la imagen (si se cambia)
    if ($_FILES["archivo"]["size"] > 0) {
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

        // Datos del archivo subido
        $archivoTemporal = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];

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
        } catch (S3Exception $e) {
            echo "En caso de error al subir la imagen a Amazon S3";
        }
    } else {
        // Si no se cambió la imagen, mantener la URL existente
        $img = $row['img'];
    }

    // Preparar y ejecutar consulta SQL de actualización
    $update = $pdo->prepare("UPDATE PRODUCTOS SET nombre = :nom, disponibilidad = :dispon, precio_app = :papp, precio_com = :pcom, tipo = :tipo, descripcion = :descr, img = :img WHERE producto_id = :id");

    $resultado = $update->execute(array(
        'id' => $id,
        'nom' => $nombre,
        'dispon' => $disponibilidad,
        'papp' => $precioapp,
        'pcom' => $preciocom,
        'tipo' => $tipoprod,
        'descr' => $description,
        'img' => $img
    ));

    // Verificar el resultado de la actualización
    if ($resultado) {
        $correcto = true;
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
                    <h1>¡Producto editado correctamente!</h1>
                <?php } else { ?>
                    <h1>Surgió un error al editar...</h1>
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