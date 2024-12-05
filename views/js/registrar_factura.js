$(document).ready(function () {
    $.ajax({
        url: "../../controllers/controlador_productos.php",
        type: "POST",
        data: {
            metodo: 'obtenerProductos'
        },
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {

                data.forEach(function (producto, index) {

                    let productoHTML = `
                    <tr class="align-middle">
                        <td>
                            <strong>${index + 1}.</strong> 
                        </td>
                        <td>
                            <span class="fw-bold">${producto.nombre}</span>
                        </td>
                        <td>
                            <span class="text-success fw-bold">${formatNumber(producto.precio)}</span>
                        </td>
                        <td>
                            <input class="form-control cantidad w-50 d-inline-block" placeholder="0" type="number" min="0" 
                            data-precio="${producto.precio}" data-id="${producto.id}">
                        </td>
                    </tr>
                `;

                    $("#productos-list tbody").append(productoHTML);
                });
            } else {
                $("#productos-list").html("<p>No se encontraron productos.</p>");
            }
        },
        error: function ($err) {
            console.log($err)
            $("#productos-list").html("<p>Hubo un error al cargar los productos.</p>");
        }
    });

    $.ajax({
        url: "../../controllers/controlador_clientes.php",
        type: "POST",
        data: {
            metodo: 'obtenerClientes'
        },
        dataType: "json",
        success: function (data) {
            data.forEach(function (cliente, index) {
                $("#clientes-list").append(`
                        <option value="${cliente.id}">${cliente.nombre_usuario}</option>
                    `);
            });
        }
    });

    var total = 0;


    $("#productos-list").on("input", ".cantidad", function () {
        total = 0;
        if ($(this).val() < 0) $(this).val() = 0;

        $(".cantidad").each(function () {
            let cantidad = $(this).val();
            let precio = $(this).data("precio");

            total += precio * cantidad;
        });

        $('#total-value').val(total);
        let totalFormateado = formatNumber(total);
        $("#total").text(totalFormateado);

        validarFormulario()
    });

    $("#clientes-list").on("input", function () {
        validarFormulario()
    });

    function validarFormulario() {
        const totalValue = parseFloat(total) || 0;

        const clienteSeleccionado = parseInt($('#clientes-list').val());

        if (totalValue === 0 || !clienteSeleccionado) {
            $('#confirmar').prop('disabled', true);
        } else {
            $('#confirmar').prop('disabled', false);
        }
    }

    function registrarFactura() {

        productos = [];
        $(".cantidad").each(function () {
            productos.push(
                {
                    id: $(this).data("id"),
                    cantidad: $(this).val()
                }
            );
        });

        $.ajax({
            url: "../../controllers/controlador_facturas.php",
            type: "POST",
            data: {
                metodo: "registrarFactura",
                productos,
                id_cliente: $('#clientes-list').val(),
                total: $('#total-value').val()
            },
            dataType: "json",
            success: function (data) {
                Swal.fire("Saved!", "", "Factura registrada correctamente").then((res) => {
                    window.location.href = 'listar_factura.php';
                });
            }
        });
    }

    $("#confirmar").on("click", function () {
        alertConfirmation(registrarFactura)
    })
});
