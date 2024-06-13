<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección Personal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
    <header>
        <h1>Sección Personal</h1>
    </header>
    <nav>
        <input type="button" value="Inicio" onclick="window.location='../index.php'">
        <input type="button" value="Cerrar Sesión" onclick="cerrarSesion()">
    </nav>
    <div class="container-fluid row">
        <form class="col-3">
            <fieldset enabled>
                <legend>nuevo producto</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">descripcion o nombre</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="descirpcion o nombre">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">cantidad</label>
                    <input type="number" id="cantidad" class="form-control" placeholder="cantidad">
                </div>
                <div class="mb-3">
                    <label for="medida" class="form-label">Unidad de medida</label>
                    <input type="text" id="medida" class="form-control" placeholder="unidad de medida">
                </div>
                <div class="mb-3">
                    <label for="estadoSelect" class="form-label">estado</label>
                    <select id="estadoSelect" class="form-select">
                        <option value="nuevo">nuevo</option>
                        <option value="desgastado">desgastado</option>
                    </select>
                    <div class="mb-3">
                        <label for="precioBase" class="form-label">precio Base</label>
                        <input type="number" id="precioBase" class="form-control" placeholder="precio Base">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">imagen del proucto, recomendable jpg o png</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                        <label class="form-check-label" for="disabledFieldsetCheck">
                            Can't check this
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        <div class="col-8 p-4">
<table class="'table">
<thead class="bg-info">
 <tr class="table-primary">
            <th scope="col">ID</th>
            <th scope="col">imagen</th>
            <th scope="col">descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col"></th>

        </tr>
</thead>
<tbody>
        <?php
        require_once './config.php';


        $conn = conectarDB();

        $sql = "SELECT id, img, descripcion, precioBase, saldo FROM producto";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</td>";
                echo '<td><img src="../img/' . $row["img"] . '" alt="Imagen del producto"></td>';
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td>" . $row["precioBase"] . "</td>";
                echo "<td>" . $row["saldo"] . "</td>";
                echo '<td>
                <a href="">editar</a>
                <a href="">elimiar</a>
                </td>';
                // echo '<td><button type="button">editar</button></td> ';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }

        // Cerrar conexión
        $conn->close();
        ?>
</tbody>
       



    </table>

</div>
        
        
        
    </div>




   
    <footer>
        <input type="button" value="Acerca de" onclick="acercaDe()">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Verificación de la sesión -->
    <script src="../js/verifysesionstorage.js"></script>
    <script src="../js/user.js"> </script>

</body>

</html>