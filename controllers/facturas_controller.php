
<?php
class ControladorFacturas
{
    private $facturaModel; // Instancia del modelo de factura

    public function __construct()
    {
        // Carga el modelo de factura y lo inicializa
        require_once __DIR__ . "/../models/facturas_model.php";
        $this->facturaModel = new Factura();
    }

    // Métodos que actúan como intermediarios entre la capa de presentación y el modelo
    public function registrarFactura($data)
    {
        return $this->facturaModel->registrarFactura($data);
    }

    public function obtenerFacturas()
    {
        return $this->facturaModel->obtenerFacturas();
    }

    public function consultarFactura($id_factura)
    {
        return $this->facturaModel->consultarFactura($id_factura);
    }

    public function eliminarFactura($id_factura)
    {
        return $this->facturaModel->eliminarFactura($id_factura);
    }

    public function anularFactura($id_factura)
    {
        return $this->facturaModel->anularFactura($id_factura);
    }
}

// Instancia del controlador y manejo de solicitudes según el método recibido
$controlador = new Controladorfacturas();

switch ($_POST['metodo']) {
    case 'registrarFactura':
        $res = $controlador->registrarFactura($_POST); // Registra una nueva factura
        break;
    case 'obtenerFacturas':
        $res = $controlador->obtenerFacturas(); // Obtiene todas las facturas
        break;
    case 'consultarFactura':
        $res = $controlador->consultarFactura($_POST['id']); // Consulta una factura específica
        break;
    case 'eliminarFactura':
        $res = $controlador->eliminarFactura($_POST['id']); // Elimina una factura
        break;
    case 'anularFactura':
        $res = $controlador->anularFactura($_POST['id']); // Anula una factura
        break;
}

// Retorna la respuesta como JSON al cliente
echo json_encode($res);
