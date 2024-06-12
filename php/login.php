<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
        <input type="button" value="Inicio" onclick="window.location.href='../index.php'" class="home">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Iniciar Sesión</button>
                <button type="button" class="toggle-btn" onclick="register()">Registrarse</button>
            </div>
            <div class="social-icons">
                <img src="../img/shopping-cart.png" alt="fb">
                <img src="../img/store.png" alt="tw">
                <img src="../img/location.png" alt="gp">
            </div>
            <form id="login" class="input-group">
                <input type="text" id="user" class="input-field" placeholder="Usuario" required>
                <input type="password" id="password" class="input-field" placeholder="Contraseña" required>
                <input type="button" value="Entrar" onclick="iniciarSecion()" class="submit-btn">
            </form>
            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Usuario" required>
                <input type="email" class="input-field" placeholder="Correo Electrónico" required>
                <input type="password" class="input-field" placeholder="Contraseña" required>
                <button type="submit" class="submit-btn">Registrarse</button>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>
