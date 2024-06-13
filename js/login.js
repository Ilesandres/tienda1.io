const seS = sessionStorage.getItem("user");
console.log(seS);
if (seS) {
  window.location.href = "../php/user.php";
}

let login1 = document.getElementById("login");
let register1 = document.getElementById("register");
let btn1 = document.getElementById("btn");

function register() {
  login1.style.transform = "translateX(-800px)";
  register1.style.transform = "translateX(20%)";
  btn1.style.left = "110px";
}

function login() {
  login1.style.transform = "translateX(20%)";
  register1.style.transform = "translateX(-800px)";
  btn1.style.left = "0";
}

async function iniciarSecion() {
  const user = document.getElementById("user").value;
  const password = document.getElementById("password").value;
  const datos = { user, password };

  console.log("user : " + user + " password " + password);

  

 
    fetch("../php/loginverify.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(datos),
    })
      .then((response) => response.json())
      .then(async (data) => {
        console.log("Respuesta del servidor", data);
        const responseDiv = document.createElement("div");
        responseDiv.style.position = "absolute";
        responseDiv.style.fontSize = "10px";
        responseDiv.style.top = "69%";
        responseDiv.style.left = "50%";
        responseDiv.style.transform = "translate(-50%, -50%)";
        responseDiv.style.padding = "20px";
        responseDiv.style.backgroundColor = "#fff";
        responseDiv.style.borderRadius = "10px";
        responseDiv.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.1)";
        responseDiv.style.textAlign = "center";
        responseDiv.textContent =
          "Respuesta del servidor: " + JSON.stringify(data);
        document.body.appendChild(responseDiv);
        if (data.status == "success") {
          sessionStorage.setItem("user", user);
          await Swal.fire({
            title: "inicio de sesion correcto",
            text: "Bienbenido " + user,
            icon: "success",
          });
          window.location.href = "../php/user.php";
        } else if (data.status == "error") {
          await swal.fire({
            title: "Datos incorrectos",
            text: "verifica tus datos",
            icon: "error",
          });
        }

        console.log("Datos introducidos correctamente");
        sessionStorage.setItem("super", data.usuario);
      })

      .catch(async (error) => {
        console.error("Error: " + error);
      });
  
}

function registrarse() {
  console.log("registrandose");
}
