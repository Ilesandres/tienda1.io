<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<div class="Title">
 <h1 class="title">Lista de Productos</h1>
</div>
   
    <nav>
    <ul>
    <li><a href="./php/login.php">login</a></li>
    <li><a href="">acerca de</a></li>
    <li><a href="">contactanos</a></li>
    <li><a href="">carrito</a></li>
    </ul>
    </nav>
    <table>
        <tr>
            <th>ID</th>
            <th>imagen</th>
            <th>descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            
        </tr>
        <?php
        // Incluir archivo de configuración
        require_once './php/config.php';
        

        // Obtener conexión a la base de datos
        $conn = conectarDB();

        // Consulta SQL para obtener los datos de la tabla products
        $sql = "SELECT id, img, descripcion, precioBase, saldo FROM producto";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo '<td><img src="./img/'.$row["img"].'" alt="Imagen del producto"></td>';
                echo "<td>" . $row["descripcion"]. "</td>";
                echo "<td>" . $row["precioBase"]. "</td>";
                echo "<td>" . $row["saldo"]. "</td>";
               // echo '<td><button type="button">editar</button></td> ';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }

        // Cerrar conexión
        $conn->close();
        ?>
        
       
    </table> 
    
</body>
</html>
