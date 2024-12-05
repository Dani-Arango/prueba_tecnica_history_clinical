function formatNumber(number) {
    return number.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP'
    });
}

function alertConfirmation(fn) {
    Swal.fire({
        title: "¿Estas seguró de realizar esta accion?",
        showDenyButton: true,
        icon: 'question',
        confirmButtonText: "Confirmar",
        denyButtonText: `Cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            fn();
        }
    })
}