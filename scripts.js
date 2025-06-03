// Mostrar alerta cuando se realiza un pedido
function showOrderAlert() {
    alert("¡Pedido realizado con éxito!");
}

// Validar formulario de registro (opcional)
function validarRegistro() {
    const password = document.querySelector('[name="password"]').value;
    if (password.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres.");
        return false;
    }
    return true;
}
