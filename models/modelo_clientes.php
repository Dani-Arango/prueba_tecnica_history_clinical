<?php
require_once "../connection.php";

class Cliente
{
    private $db; // Conexión a la base de datos

    public function __construct()
    {
        // Inicializa la conexión a la base de datos
        $db = new Database();
        $this->db = $db->getConnection();
    }

    /**
     * Obtiene una lista de todos los clientes
     */
    public function obtenerClientes()
    {
        try {
            // Consulta para obtener todos los registros de los clientes
            $stmt = $this->db->query("SELECT * FROM clientes");

            // Recupera todos los resultados como un array asociativo
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return []; // Retorna un array vacío en caso de error
        }
    }
}
