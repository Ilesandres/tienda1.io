function sesionStorage() {
  const user = sessionStorage.getItem("user");
  const currentPath = window.location.pathname;

  if (user !== null) {
      if (currentPath !== '/php/user.php') {
          window.location.href = "../php/user.php";
      }
  } else {
      Swal.fire({
          icon: 'warning',
          title: 'No has iniciado sesión',
          text: 'Por favor, inicia sesión.',
          confirmButtonText: 'Aceptar'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "../php/login.php";
          }
      });
  }
}

sesionStorage();
