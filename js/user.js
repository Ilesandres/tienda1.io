

function cerrarSesion() {
    sessionStorage.removeItem("user");
    Swal.fire({
        icon: 'success',
        title: 'Sesión cerrada',
        text: 'Has cerrado sesión correctamente.',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/php/pantallas/login.php";
        }
    });
}

function acercaDe() {
    Swal.fire({
        title: 'Acerca de',
        text: 'Este es un ejemplo de un sistema de gestión personal.',
        icon: 'info',
        confirmButtonText: 'Aceptar'
    });
}