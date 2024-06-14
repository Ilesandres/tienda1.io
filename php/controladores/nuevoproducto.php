<?php

require_once '/platvent_2/php/controladores/config.php';
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
        $estado = ($estadoValue === 'nuevo') ? 1 : 0;

        $imgPath = 'default.png'; // Default image path

        if (!empty($_FILES['img']['tmp_name'])) {
            $ruta = '/platvent_2/img/';
            $imagen = $_FILES['img']['tmp_name'];
            $nombreImagen = $_FILES['img']['name'];
            $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

            if (in_array($tipoImagen, ['jpg', 'jpeg', 'png'])) {
                $idRegistro = null;

                $con->begin_transaction(); // Start transaction

                try {
                    $registro = $con->query("INSERT INTO producto(descripcion, stock, unidadMedida, saldo, estado, PrecioBase, img) VALUES ('$nombre', '$cantidad', '$medida', '$saldo', '$estado', '$precioBase', '')");

                    if ($registro) {
                        $idRegistro = $con->insert_id;
                        $cam = $idRegistro . "-." . $tipoImagen;
                        $actualizarImg = $con->query("UPDATE producto SET img='$cam' WHERE id='$idRegistro'");

                        if ($actualizarImg) {
                            if (!is_dir($ruta)) {
                                mkdir($ruta, 0777, true);
                            }

                            if (move_uploaded_file($imagen, $ruta . $cam)) {
                                $con->commit(); // Commit transaction
                                echo '<div class="alert alert-info">Imagen guardada exitosamente</div>';
                            } else {
                                throw new Exception('No se pudo guardar tu imagen, vuelve a intentarlo');
                            }
                        } else {
                            throw new Exception('Error al actualizar la imagen en la base de datos');
                        }
                    } else {
                        throw new Exception('Error al registrar el producto: ' . $con->error);
                    }
                } catch (Exception $e) {
                    $con->rollback(); // Rollback transaction on error
                    echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
                }
            } else {
                echo '<div class="alert alert-info">Formato de imagen no aceptado</div>';
            }
        } else {
            $registro = $con->query("INSERT INTO producto(descripcion, stock, unidadMedida, saldo, estado, PrecioBase, img) VALUES ('$nombre', '$cantidad', '$medida', '$saldo', '$estado', '$precioBase', '$imgPath')");
            if ($registro) {
                echo '<div class="alert alert-info">Producto registrado sin imagen</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar el producto: ' . $con->error . '</div>';
            }
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo '<div class="alert alert-danger">Algunos campos están vacíos</div>';
    }
}

?>
