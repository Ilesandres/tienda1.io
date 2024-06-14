function sesionStorage() {
    const user = sessionStorage.getItem("user");
    const currentPath = window.location.pathname;
  
    // Verifica si el usuario está autenticado
    if (user !== null) {
        // Verifica si la ruta actual es diferente de la ruta protegida
        if (currentPath !== '/php/pantallas/user.php') {
            window.location.href = "/php/pantallas/user.php";
        }
    } else {
        // Si el usuario no está autenticado, muestra una alerta y redirige al inicio de sesión
        Swal.fire({
            icon: 'error',
            title: 'No has iniciado sesión',
            text: 'Por favor, inicia sesión.',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/php/pantallas/login.php";
            }
        });
    }
  }
  
  // Ejecuta la función
  sesionStorage();
  