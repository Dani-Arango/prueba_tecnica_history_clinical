$(document).ready(function () {
    // Función para obtener y mostrar las facturas en la tabla
    function consultarFacturas() {
        $("#facturas-list tbody").html(''); // Limpia la tabla antes de llenarla
        $.ajax({
            url: "../../controllers/facturas_controller.php",
            type: "POST",
            data: {
                metodo: 'obtenerFacturas' // Método para obtener las facturas
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    // Genera las filas dinámicamente para cada factura
                    data.forEach(function (factura, index) {
                        let btnAnular = `<button class="btn btn-warning btn-sm text-white anular" data-metodo="anularFactura" data-id="${factura.factura_id}">
                                Anular
                            </button>`;

                        if (factura.estado == 'Anulado') btnAnular = '';

                        let facturaHTML = `
                    <tr>
                    <td>
                        ${factura.factura_id}  
                    </td>
                    <td>
                        ${factura.fecha}  
                    </td>
                    <td>
                        ${factura.nombre_usuario}  
                    </td>
                    <td class="text-success">
                        ${formatNumber(factura.total)}  
                    </td>
                    <td>
                        ${factura.estado}  
                    </td>
                    <td>
<a class="btn btn-info btn-sm text-white detalles" href="detalle_factura.php?id=${factura.factura_id}">
    Detalles
</a>
${btnAnular}
<button class="btn btn-danger btn-sm eliminar" data-metodo="eliminarFactura" data-id="${factura.factura_id}">
    Eliminar
</button>
                    </td>
                    </tr>
                    `;
                        $("#facturas-list tbody").append(facturaHTML); // Agrega la fila a la tabla
                    });
                } else {
                    // Muestra un mensaje si no hay facturas
                    $("#facturas-list").html("<p>No se encontraron facturas.</p>");
                }
            },
            error: function ($err) {
                console.log($err);
                // Muestra un mensaje de error si la petición falla
                $("#facturas-list").html("<p>Hubo un error al cargar.</p>");
            }
        });
    }

    consultarFacturas(); // Llama a la función al cargar la página

    // Maneja los clics en los botones de anular o eliminar
    $("#facturas-list").on("click", ".anular, .eliminar", function () {
        alertConfirmation(() => {
            // Realiza una petición AJAX para anular o eliminar la factura según el método
            $.ajax({
                url: "../../controllers/facturas_controller.php",
                type: "POST",
                data: {
                    metodo: $(this).data('metodo'), // Determina el método según el botón
                    id: $(this).data('id') // ID de la factura
                },
                dataType: "json",
                success: function (data) {
                    Swal.fire("Cambio realizado correctamente", "", "success").then((res) => {
                        consultarFacturas(); // Actualiza la lista de facturas
                    });
                },
                error: function ($err) {
                    console.error($err);
                }
            });
        });
    });
});