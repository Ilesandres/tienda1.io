<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once './config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $usuario = $datos['user'];
    $contraseña = $datos['password'];
    
    $response = array(
        'status' => 'success',
        'message' => 'Datos recibidos correctamente',
        'received' => array(
            'usuario' => $usuario,
            'contraseña' => $contraseña
        )
    );
    echo json_encode($response);

} else {
    // Si el método de solicitud no es POST, enviar un mensaje de error
    $response = array(
        'status' => 'error',
        'message' => 'Método de solicitud no permitido'
    );

    echo json_encode($response);
}
