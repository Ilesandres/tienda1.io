<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
    <script src="https://kit.fontawesome.com/4a47433372.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="text-center py-3">
        <h1 class="text-center text-secondary font-weight-bold ">modificar producto</h1>
    </header>
    <nav class="text-center my-3">
        <button class="btn btn-primary mx-2" onclick="window.location='/index.php'">Inicio</button>
        <button class="btn btn-danger mx-2" onclick="cerrarSesion()">Cerrar Sesión</button>
    </nav>
    <div class="container-fluid row">
        <form class="col-3 p-3 border rounded shadow-sm" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend class="text-center">Nuevo Producto</legend>
                <?php 
                require_once '/platvent_2/php/controladores/config.php';
                require_once '/platvent_2/php/controladores/nuevoproducto.php';
                ?>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Descripción o Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Descripción o nombre">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad">
                </div>
                <div class="mb-3">
                    <label for="medida" class="form-label">Unidad de Medida</label>
                    <input type="text" id="medida" name="medida" class="form-control" placeholder="Unidad de medida">
                </div>
                <div class="mb-3">
                    <label for="estadoSelect" class="form-label">Estado</label>
                    <select id="estadoSelect" name="estado" class="form-select">
                        <option value="nuevo">Nuevo</option>
                        <option value="desgastado">Desgastado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precioBase" class="form-label">Precio Base</label>
                    <input type="number" name="precioBase" id="precioBase" class="form-control" placeholder="Precio Base">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen del Producto (JPG o PNG)</label>
                    <input class="form-control" type="file" name="img" id="formFile">
                </div>
                <button type="submit" name="btnregistrar" value="ok" class="btn btn-success w-100">Agregar</button>
            </fieldset>
        </form>
        
        <div class="colum-3">
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src=""></script>
</body>
</html>