<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <header>
        <h1>Sección Personal</h1>
    </header>
    <nav>
        <input type="button" value="Inicio" onclick="window.location='../index.php'">
        <input type="button" value="Cerrar Sesión" onclick="cerrarSesion()">
    </nav>
    <footer>
        <input type="button" value="acerca de">
    </footer>
    
    <script src="../js/verifySessionStorage.js"></script>
    <script>
        function cerrarSesion() {
            sessionStorage.removeItem("user");
            alert("Sesión cerrada correctamente.");
            window.location.href = "../php/login.php";
        }
    </script>
</body>
</html>
