function sesionStorage() {
    const user = sessionStorage.getItem("user");
    if (user !== null) {
      window.location.href = "../php/user.php";
    } else {
      alert("No has iniciado sesión, por favor inicia sesión.");
      window.location.href = "../php/login.php";
    }
}

sesionStorage();
