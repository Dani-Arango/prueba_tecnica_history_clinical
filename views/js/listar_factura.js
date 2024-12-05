$(document).ready(function () {
    function consultarFacturas() {
        $("#facturas-list tbody").html('');
        $.ajax({
            url: "../../controllers/controlador_facturas.php",
            type: "POST",
            data: {
                metodo: 'obtenerFacturas'
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {

                    data.forEach(function (factura, index) {
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
                    <td>
                        ${formatNumber(factura.total)}  
                    </td>
                    <td>
                        ${factura.estado}  
                    </td>
                    <td>
                    <a class="detalles" href="detalle_factura.php?id=${factura.factura_id}" >
                        detalles
                    </a>
                    <button class="anular" data-metodo="anularFactura" data-id="${factura.factura_id}"> 
                        Anular
                    </button>
                    <button class="eliminar" data-metodo="eliminarFactura" data-id="${factura.factura_id}"> 
                        Eliminar
                    </button>
                    </td>
                    </tr>
                    `;
                        $("#facturas-list tbody").append(facturaHTML);
                    });
                } else {
                    $("#facturas-list").html("<p>No se encontraron facturas.</p>");
                }
            },
            error: function ($err) {
                console.log($err)
                $("#facturas-list").html("<p>Hubo un error al cargar.</p>");
            }
        });
    }

    consultarFacturas();

    $("#facturas-list").on("click", ".anular, .eliminar", function () {
        alertConfirmation(() => {
            $.ajax({
                url: "../../controllers/controlador_facturas.php",
                type: "POST",
                data: {
                    metodo: $(this).data('metodo'),
                    id: $(this).data('id')
                },
                dataType: "json",
                success: function (data) {
                    Swal.fire("Cambio realizado correctamente", "", "success").then((res) => {
                        consultarFacturas();
                    });
                }
            })
        })
    });
});
