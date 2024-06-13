<?php

require_once './config.php';
$con=conectarDB();

if (!empty($_POST['btnregistrar'])) {

    if (
        !empty($_POST['nombre']) && !empty($_POST['cantidad']) && !empty($_POST['medida'])
        && !empty($_POST['estado']) && !empty($_POST['precioBase'])
    ) {
        if (!empty($_POST['img'])) {
            echo 'incuyes la imagen';
            $nombre = $_POST['nombre'];
            $cantidad = intval($_POST['cantidad']);
            $medida =($_POST['medida']);
            $estado = ($_POST['estado']);
            $precioBase = floatval($_POST['precioBase']);


      
            



        } else {
            echo 'sin imagen';
        }



    } else {
        echo 'ALGUNOS CAMPOS ESTAN VACIOS';
    }



}
;