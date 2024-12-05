$(document).ready(function () {
    // Obtiene los parámetros de la URL para identificar la factura
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id'); // Obtiene el ID de la factura

    // Realiza una petición AJAX para consultar los detalles de la factura
    $.ajax({
        url: "../../controllers/facturas_controller.php", // URL del controlador
        type: "POST", // Tipo de petición
        data: {
            metodo: 'consultarFactura', // Método para consultar la factura
            id // ID de la factura
        },
        dataType: "json", // Formato esperado de la respuesta
        success: function (data) {
            // Agrega los datos generales de la factura a los elementos correspondientes
            $("#nombre").append(data.nombre_usuario);
            $("#fecha").append(data.fecha);
            $("#telefono").append(data.telefono);
            $("#email").append(data.email);
            $("#estado").append(data.estado);
            $("#factura_id").append(data.factura_id);
            $("#total").append(formatNumber(data.total));

            // Agrega los detalles de los productos a la tabla
            data.detalle.forEach(element => {
                $("#productos tbody").append(`
                    <tr>
                        <td class="fw-bold">
                        ${element.id}
                        </td>
                        <td>
                        ${element.nombre}
                        </td>
                        <td class="text-success">
                        ${formatNumber(element.precio)}
                        </td>
                        <td>
                        ${element.cantidad_producto}
                        </td>
                    </tr>
                `);
            });
        },
        error: function ($err) {
            console.log($err);
            // Muestra un mensaje de error si la petición falla
            $("#facturas-list").html("<p>Hubo un error al cargar.</p>");
        }
    });
});
