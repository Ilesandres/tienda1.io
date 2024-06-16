function alertaproducto() {
    // Obtener los parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status && message) {
        let title, icon;

        // Determinar el título y el icono de acuerdo al estado
        if (status === 'success') {
            title = 'bien hecho';
            text='producto agregado o modificado con exito';
            icon = 'success';
        } else {
            title = 'Error';
            text='no se ha podido agregar el producto';
            icon = 'error';
        }

        // Mostrar la alerta con SweetAlert2
        Swal.fire({
            title: title,
            text: decodeURIComponent(message),
            icon: icon,
            confirmButtonText: 'OK'
        }).then((result) => {
            // Realizar acciones después de hacer clic en "OK"
            if (result.isConfirmed && status === 'success') {
                // Si es exitoso, recargar la página o redirigir
                window.location.href = window.location.pathname; // Recargar sin parámetros
            }
        });
    }
}





document.addEventListener('DOMContentLoaded', (event) => {
    alertaproducto();
});