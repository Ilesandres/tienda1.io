<?php

require_once './config.php';
$con = conectarDB();

if (!empty($_POST['btnregistrar'])) {
    if (
        !empty($_POST['nombre']) && !empty($_POST['cantidad']) && !empty($_POST['medida'])
        && !empty($_POST['estado']) && !empty($_POST['precioBase'])
    ) {
        $nombre = $con->real_escape_string($_POST['nombre']);
        $cantidad = intval($_POST['cantidad']);
        $medida = $con->real_escape_string($_POST['medida']);
        $estadoValue = $con->real_escape_string($_POST['estado']);
        $precioBase = floatval($_POST['precioBase']);
        $saldo = $precioBase * $cantidad;
        $estado = 0;
        if ($estadoValue == 'nuevo') {
            $estado = 1;
        }

        if (!empty($_FILES['img'])) {
            $ruta = '../img/';
            $imagen = $_FILES['img']['tmp_name'];
            $sizeImagen = $_FILES['img']['size'];
            $nombreImagen = $_FILES['img']['name'];
            $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));


            if ($tipoImagen == 'jpg' || $tipoImagen == 'jpeg' || $tipoImagen == 'png') {
                $registro = $con->query("insert into producto(descripcion,stock,unidadMedida,saldo,estado,PrecioBase,img) values
            ('$nombre','$cantidad','$medida','$saldo','$estado','$precioBase','')");
                $idRegistro = $con->insert_id;

                $cam = $idRegistro . "-." . $tipoImagen;

                $actualizarImg = $con->query("update producto set img='$cam' where id='$idRegistro'");

                //almacen de la imagen
                if ($registro == 1 && $actualizarImg == 1) {
                    
                    if (move_uploaded_file($imagen, $ruta . '/' . $cam)) {


                        echo '<div class="alert alert-info">imagen guardada exitosamente</div>';
                    } else {
                        echo '<div class="alert alert-danger">no se pudo guardar tu imagen, vuelve a intentarlo</div>';
                    }
                }







            } else {
                echo '<div class="alert alert-info">no se acepta este formato</div>';
            }




        } else {
            $registro = $con->query('insert into producto(img) values ("default.png")');

            echo 'sin imagen';
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();

    } else {
        echo 'ALGUNOS CAMPOS ESTAN VACIOS';
    }



}

?>
