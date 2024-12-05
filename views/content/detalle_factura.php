<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="w-100 bg-primary p-3 text-white fs-3">
        DETALLE DE FACTURA
    </div>

    <div class="m-5">
        <div class="my-3">
            <a class="btn btn-primary" href="./listar_factura.php">Volver</a>
        </div>

        <div class="p-4 border rounded shadow-sm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="fs-5"><strong>Cliente:</strong> <span id="nombre" class="text-secondary"></span></p>
                    <p><strong>Teléfono:</strong> <span id="telefono"></span></p>
                    <p><strong>Email:</strong> <span id="email"></span></p>
                </div>
                <div class="col-md-6 text-end">
                    <p><strong>ID de Factura:</strong> <span id="factura_id"></span></p>
                    <p><strong>Fecha de creación:</strong> <span id="fecha"></span></p>
                    <p><strong>Estado:</strong> <span id="estado" class="badge bg-info text-dark"></span></p>
                </div>
            </div>

            <div class="mt-4">
                <table id="productos" class="table table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio Neto</th>
                            <th>Cantidad Comprada</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <h4 class="fw-bold">Total: <span id="total" class="text-success"></span></h4>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/detalle_factura.js"></script>
</body>

</html>