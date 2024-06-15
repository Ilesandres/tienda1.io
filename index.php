<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4a47433372.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="Title">
        <h1 class="title p-5">Lista de Productos</h1>
    </div>

    <nav>
        <ul>
            <li><a href="/php/pantallas/login.php">login</a></li>
            <li><a href="">acerca de</a></li>
            <li><a href="">contactanos</a></li>
            <li><a href="/php/pantallas/carrito.php">carrito</a></li>
        </ul>
    </nav>

    <div class="colum-3">
        <?php
        require_once '/platvent_2/php/controladores/config.php';

        $conn = conectarDB();

        $sql = "SELECT * FROM producto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($datos = $result->fetch_assoc()) {
        ?>
                <div class="container">
                    <div class="image p-3">
                        <img src='/img/<?= $datos["img"] ?>' alt="">
                    </div>
                    <h2><?=$datos["descripcion"]?></h2>
                    <h4><b> precio: <?=$datos["precioBase"]?></b></h4>
                </div>
               
                
        <?php
            }
        } else {
            echo "<tr><td colspan='10' class='text-center'>0 resultados</td></tr>";
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>