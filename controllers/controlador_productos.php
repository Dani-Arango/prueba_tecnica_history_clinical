<?php
class ControladorProductos
{
    private $productoModel; // Instancia del modelo de productos

    public function __construct()
    {
        // Carga el modelo de productos y lo inicializa
        require_once __DIR__ . "/../models/modelo_productos.php";
        $this->productoModel = new Producto();
    }

    /**
     * Llama al modelo para obtener la lista de productos
     */
    public function obtenerProductos()
    {
        return $this->productoModel->obtenerProductos();
    }
}

// Instancia del controlador y manejo de la solicitud
$controlador = new ControladorProductos();

switch ($_POST['metodo']) {
    case 'obtenerProductos':
        // Llama al método correspondiente para obtener productos
        $res = $controlador->obtenerProductos();
        break;
}

// Devuelve la respuesta al cliente en formato JSON
echo json_encode($res);
