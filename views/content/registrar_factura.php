<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Técnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="w-100 bg-primary p-3 text-white fs-3 text-center">
        CREAR FACTURA
    </div>
    <div class="m-5">
        <div class="my-3">
            <a class="btn btn-primary" href="./listar_factura.php">Volver</a>
        </div>
        <div>
            <div class="mb-4">
                <label for="clientes-list" class="form-label fw-bold">Cliente a asignar:</label>
                <select name="" id="clientes-list" class="form-select">
                    <option value="0">Seleccione un cliente...</option>
                </select>
            </div>
            <div class="mb-4">
                <h2 class="h4 fw-bold">Productos</h2>
                <table id="productos-list" class="table table-bordered text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad a Comprar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="fs-5 my-4 d-flex align-items-center justify-content-between">
                <button disabled class="btn btn-success" id="confirmar">Confirmar</button>
                <div class="text-end fw-bold">
                    Total: <span id="total" class="text-success">$ 0</span>
                    <input type="hidden" id="total-value" value="0">
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/scripts.js"></script>
<script src="../js/registrar_factura.js"></script>

</html>
