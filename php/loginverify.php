<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once './config.php';
$con = conectarDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $usuario = $datos['user'];
    $contraseña = $datos['password'];

    // Escapar las variables para evitar la inyección SQL
    $usuario_escapado = mysqli_real_escape_string($con, $usuario);
    $contraseña_escapada = mysqli_real_escape_string($con, $contraseña);

    // Consulta SQL para seleccionar un usuario con la contraseña correspondiente
    $sql = "SELECT usuario, contraseña FROM usuario WHERE usuario='$usuario_escapado' AND contraseña='$contraseña_escapada'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Si se encuentra un usuario con la contraseña correspondiente
        $response = array(
            'status' => 'success',
            'message' => 'Inicio de sesión exitoso',
            'usuario' => $usuario
        );
        echo json_encode($response);
    } else {
        // Si no se encuentra un usuario con la contraseña correspondiente
        $response = array(
            'status' => 'error',
            'message' => 'Usuario o contraseña incorrectos'
        );
        echo json_encode($response);
    }
} else {
    // Si el método de solicitud no es POST, enviar un mensaje de error
    $response = array(
        'status' => 'error',
        'message' => 'Método de solicitud no permitido'
    );
    echo json_encode($response);
}
