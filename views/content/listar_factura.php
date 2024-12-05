<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba tecnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="w-100 bg-primary p-3 text-white fs-3">
        GESTIÓN DE FACTURACIÓN
    </div>
    <div class="m-5">
        <div class="my-3">
            <a class="btn btn-primary" href="./registrar_factura.php">

                Registrar factura
            </a>
        </div>

        <table class="table table-bordered" id="facturas-list">
            <thead class="table-primary">
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Fecha de creación
                    </th>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Precio total
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/scripts.js"></script>
<script src="../js/listar_factura.js"></script>

</html>