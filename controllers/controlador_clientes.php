<?php
class ControladorClientes {
    private $clienteModel; // Instancia del modelo de clientes

    public function __construct(){
        // Carga el modelo de clientes y lo inicializa
        require_once __DIR__ . "/../models/modelo_clientes.php";   
        $this->clienteModel = new Cliente();   
    }

    /**
     * Llama al modelo para obtener la lista de clientes
     */
    public function obtenerClientes()
    {
        return $this->clienteModel->obtenerClientes();   
    }
}

// Instancia del controlador y manejo de la solicitud
$controlador = new ControladorClientes();

switch ($_POST['metodo']) {
    case 'obtenerClientes':
        // Llama al método correspondiente para obtener clientes
        $res = $controlador->obtenerClientes();
        break;
}

// Devuelve la respuesta al cliente en formato JSON
echo json_encode($res);
?>
