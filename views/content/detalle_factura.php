<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba tecnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="m-5">
    <div class="my-3">
        <a class="btn btn-secondary" href="./listar_factura.php">Volver</a>
    </div>

    <div class="border m-5 p-5">
        <div class="">
            <div>
                <h4 id="nombre"></h4>
            </div>
            <div>
                Telefono:
                <span id="telefono"></span>
            </div>
            <div class="">
                Email:
                <span id="email"></span>
            </div>
            <hr>
            <div class="">
                Id de la factura:
                <span id="factura_id"></span>
            </div>
            <div class="">
                Fecha de creación:
                <span id="fecha"></span>
            </div>
            <div class="">
                Estado:
                <span id="estado"></span>
            </div>
        </div>
        <div class="my-4">
            <table id="productos" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Producto
                        </th>
                        <th>
                            Precio neto
                        </th>
                        <th>
                            Cantidad comprada
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="fw-bold">
            Total: <span id="total"></span>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="../js/detalle_factura.js"></script>

</html>