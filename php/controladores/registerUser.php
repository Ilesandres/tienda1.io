<?php 
    require_once '/platvent_2/php/controladores/config.php';
    $conexion=conectarDB();
    
    if (!empty($_POST['btnregisteruser'])) {
        echo '<div class="alert alert-info">Imagen guardada exitosamente </div>';
        echo "<script>console.log('PHP: response');</script>";
        
        
    } 
    
