<?php

require_once '/platvent_2/php/controladores/config.php';
$con=conectarDB();

if(!empty($_GET['id']) && !empty($_GET['img'])){
    $idProductAfter=$_GET['id'];
    $ruta='/platvent_2/img/';
    $imgDelete=$_GET['img'];
    

    $sql="delete from producto where id='$idProductAfter'";
    $result=$con->query($sql);
    
    if ($result) {
    if ($imgDelete!=='default.png') {
        # code...
        try{
            unlink($ruta.$imgDelete);
            echo '<div class="alert alert-info">producto eliminado con exito</div>';
            header("Location: " . $_SERVER['PHP_SELF'] . "?status=success&message=Producto elimanado con éxito");
        }catch(\Throwable $th){
            #code
         }
    } else {
        # code...
    }
    
    
    
        
    } else {
        echo '<div class="alert alert-info">error al eliminar el producto</div>';
    }
    
    
    
}else{
#code
}