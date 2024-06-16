<?php


require_once '/platvent_2/php/controladores/config.php';

$conn=conectarDB();


if(!empty($_POST['btnmodificar'])){

if(!empty($_POST['nombre']) &&!empty($_POST['cantidad']) &&!empty($_POST['medida']) &&!empty($_POST['estado']) && $_POST['estado']!=='null'  
&& !empty($_POST['precioBase'])){

    
    $nombre=$conn->real_escape_string($_POST['nombre']);
    $cantidad=intval($_POST['cantidad']);
    $medida=$conn->real_escape_string($_POST['medida']);
    $estado=intval($_POST['estado']);
    $precioBase=floatval($_POST['precioBase']);
    $saldo=$precioBase*$cantidad;
    $idProduct=intval($_POST['idProduct']);
    $fecha_actualizacion = date("Y-m-d H:i:s");
    
    $sql=$conn->query("update producto set descripcion='$nombre', stock='$cantidad', unidadMedida='$medida', precioBase='$precioBase', saldo='$saldo',
      fechaActualizacion='$fecha_actualizacion', estado='$estado' where id='$idProduct'
    ");
    if($sql){
    header('location: /php/pantallas/user.php?status=success&message=Producto editado con éxito');
    }else{
     echo '<div class="alert alert-danger">error al actualizar el  producto</div>';
    }
    

}else{
    echo '<div class="alert alert-danger">verifica que toodos los datos se encuentren llenos</div>';
}
   
    
    
    
}

