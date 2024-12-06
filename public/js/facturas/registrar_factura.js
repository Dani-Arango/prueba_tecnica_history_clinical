$(document).ready(function () {
    // Realiza una petición AJAX para obtener productos desde el controlador
    $.ajax({
        url: "../../controllers/productos_controller.php",
        type: "POST",
        data: {
            metodo: 'obtenerProductos'
        },
        dataType: "json",
        success: function (data) {
            // Si hay productos, los agrega dinámicamente a la tabla
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
                    $("#productos-list tbody").append(productoHTML)
                })
            } else {
                // Muestra un mensaje si no hay productos
                $("#productos-list").html("<p>No se encontraron productos.</p>")
            }
        },
        error: function ($err) {
            console.log($err)
            // Muestra un mensaje de error si la petición falla
            $("#productos-list").html("<p>Hubo un error al cargar los productos.</p>")
        }
    })

    // Realiza una petición AJAX para obtener clientes desde el controlador
    $.ajax({
        url: "../../controllers/clientes_controller.php",
        type: "POST",
        data: {
            metodo: 'obtenerClientes'
        },
        dataType: "json",
        success: function (data) {
            // Agrega dinámicamente los clientes al dropdown
            data.forEach(function (cliente, index) {
                $("#clientes-list").append(`
                        <option value="${cliente.id}">${cliente.nombre_usuario}</option>
                    `)
            })
        },
        error: function ($err) {
            console.error($err)
        }
    })

    var total = 0 // Inicializa el total en 0

    // Evento para recalcular el total al cambiar cantidades
    $("#productos-list").on("input", ".cantidad", function () {
        total = 0 // Reinicia el total

        if (parseInt($(this).val()) < 0) {
            $(this).val(0) // Evita cantidades negativas
        }

        // Recalcula el total sumando el precio por cantidad de cada producto
        $(".cantidad").each(function () {
            let cantidad = $(this).val()
            let precio = $(this).data("precio")
            total += precio * cantidad
        })

        // Actualiza el valor del total en la interfaz
        $('#total-value').val(total)
        let totalFormateado = formatNumber(total)
        $("#total").text(totalFormateado)

        validarFormulario() // Valida si el formulario está listo para confirmar
    })

    // Evento para validar cuando se selecciona un cliente
    $("#clientes-list").on("input", function () {
        validarFormulario()
    })

    // Función que habilita o deshabilita el botón de confirmar según las condiciones
    function validarFormulario() {
        const totalValue = parseFloat(total) || 0
        const clienteSeleccionado = parseInt($('#clientes-list').val())

        if (totalValue === 0 || !clienteSeleccionado) {
            $('#confirmar').prop('disabled', true)
        } else {
            $('#confirmar').prop('disabled', false)
        }
    }

    // Función que registra la factura mediante una petición AJAX
    function registrarFactura() {
        productos = []
        $(".cantidad").each(function () {
            productos.push(
                {
                    id: $(this).data("id"),
                    cantidad: $(this).val()
                }
            )
        })

        $.ajax({
            url: "../../controllers/facturas_controller.php",
            type: "POST",
            data: {
                metodo: "registrarFactura",
                productos,
                id_cliente: $('#clientes-list').val(),
                total: $('#total-value').val()
            },
            dataType: "json",
            success: function (data) {
                // Muestra un mensaje de éxito y redirige a la lista de facturas
                Swal.fire("Factura registrada correctamente", "", "success").then((res) => {
                    window.location.href = 'listar_factura.php'
                })
            },
            error: function ($err) {
                console.error($err)
            }
        })
    }

    // Evento para confirmar y registrar la factura
    $("#confirmar").on("click", function () {
        alertConfirmation(registrarFactura)
    })
})
