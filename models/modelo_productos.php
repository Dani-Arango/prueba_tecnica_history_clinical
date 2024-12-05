<?php
require_once "../connection.php";

class Producto
{
    private $db; // Conexión a la base de datos

    public function __construct()
    {
        // Inicializa la conexión a la base de datos 
        $db = new Database();
        $this->db = $db->getConnection();
    }

    /**
     * Obtiene una lista de todos los productos
     */
    public function obtenerProductos()
    {
        try {
            // Consulta para obtener todos los registros de los productos
            $stmt = $this->db->query("SELECT * FROM productos");

            // Recupera todos los resultados como un array asociativo
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data; 
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return []; // Retorna un array vacío en caso de error
        }
    }
}
