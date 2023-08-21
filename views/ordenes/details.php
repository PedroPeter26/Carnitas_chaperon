<?php
    require '../class/config.php';
    require '../class/database.php';
    $db = new Database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    $id = isset($_GET['producto_id']) ? $_GET['producto_id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' || $token == '')
    {
        echo "Error al procesar la peticion.";
        exit;
    }
    else
    {
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        if($token == $token_tmp)
        {
            $sql = $pdo->prepare("SELECT count(producto_id) from PRODUCTOS where producto_id=? and status='Activo'");
            $sql->execute([$id]);
            if($sql->fetchAll() > 0)
            {
                $sql = $pdo->prepare("SELECT nombre, precio_app from PRODUCTOS where producto_id=? and status='Activo' LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre'];
                $precio = $row['precio'];
            }
        }
        else
        {
            echo "error al procesar la peticion";
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <title>PARA LLEVAR</title>
</head>
<body>
    
    <script>
        function addProducto(producto_id, token)
        {
            let url = '../class/ordenrapido.php'
            let formData = new FormData()
            formData.append('producto_id', producto_id)
            formData.append('token', token)

            fetch(url,
            {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then (data => {
                if(data.ok)
                {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>

</body>
</html>