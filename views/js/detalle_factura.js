$(document).ready(function () {
    const params = new URLSearchParams(window.location.search);

    const id = params.get('id'); 
    
    $.ajax({
        url: "../../controllers/controlador_facturas.php",  
        type: "POST",   
        data: {
            metodo: 'consultarFactura',
            id
        },
        dataType: "json",   
        success: function (data) {
            $("#nombre").append(data.nombre_usuario);
            $("#fecha").append(data.fecha);
            $("#telefono").append(data.telefono);
            $("#email").append(data.email);
            $("#estado").append(data.estado);
            $("#factura_id").append(data.factura_id);
            $("#total").append(formatNumber(data.total));
            
            data.detalle.forEach(element => {
                $("#productos tbody").append(`
                    <tr>
                        <td class="fw-bold">
                        ${element.id}
                        <td>
                        ${element.nombre}
                        </td>
                        </td>
                        <td>
                        ${formatNumber(element.precio)}
                        </td>
                        <td>
                        ${element.cantidad_producto}
                        </td>
                    </tr>
              `  );
            });
        },
        error: function ($err) {
            console.log($err)
            $("#facturas-list").html("<p>Hubo un error al cargar.</p>");
        }
    });
});
