<?php
class Database {
    private $host = "localhost"; // Servidor de la base de datos
    private $db_name = "Facturas"; // Nombre de la base de datos
    private $username = "root"; // Nombre de usuario
    private $password = ""; // Contraseña de la base de datos
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}