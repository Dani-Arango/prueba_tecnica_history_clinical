// Formatea números en estilo de moneda COP
function formatNumber(number) {
    return number.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP'
    });
}

// Muestra una alerta de confirmación antes de realizar una acción
function alertConfirmation(fn) {
    Swal.fire({
        title: "¿Estas seguró de realizar esta accion?",
        showDenyButton: true,
        icon: 'question',
        confirmButtonText: "Confirmar",
        denyButtonText: `Cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            fn(); // Ejecuta la función pasada como parámetro si se confirma
        }
    });
}