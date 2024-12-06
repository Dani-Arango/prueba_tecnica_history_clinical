<?php
require_once "../connection.php";

class Factura
{
    private $db; // Conexión a la base de datos

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getConnection();
    }

    /**
     * Obtiene una lista de todas las facturas junto con información básica del cliente
     */
    public function obtenerFacturas()
    {
        try {
            // Consulta con JOIN para obtener datos de facturas y clientes relacionados
            $stmt = $this->db->query("
            SELECT 
            t1.id AS factura_id,
            t1.fecha,
            t1.total,
            t1.estado,
            t2.id AS cliente_id,
            t2.nombre_usuario
            FROM facturas AS t1
            INNER JOIN clientes AS t2 ON t1.id_cliente = t2.id;
        ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas las facturas como un array asociativo
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return []; // Retorna un array vacío en caso de error
        }
    }

    /**
     * Consulta una factura específica por ID, incluyendo su detalle de productos
     */
    public function consultarFactura($id)
    {
        try {
            // Obtiene datos principales de la factura y del cliente relacionado
            $stmt = $this->db->prepare("
            SELECT 
            t1.id AS factura_id,
            t1.fecha,
            t1.total,
            t1.estado,
            t2.id AS cliente_id,
            t2.email,
            t2.telefono,
            t2.nombre_usuario
            FROM facturas AS t1
            INNER JOIN clientes AS t2 ON t1.id_cliente = t2.id
            WHERE t1.id = ?;
        ");
            $stmt->execute([$id]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; // Recupera la primera fila

            // Obtiene el detalle de productos relacionados con la factura
            $stmt = $this->db->prepare("
            SELECT 
            *
            FROM facturas_productos
            INNER JOIN productos ON id_producto = id
            WHERE id_factura = ?;
        ");
            $stmt->execute([$data['factura_id']]);
            $data['detalle'] = $stmt->fetchAll(PDO::FETCH_ASSOC); // Agrega los detalles al resultado principal

            return $data; // Retorna los datos completos
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return []; // Manejo de errores con un retorno vacío
        }
    }

    /**
     * Registra una nueva factura y sus detalles 
     */
    public function registrarFactura($data)
    {
        try {
            // Inserta la factura con el cliente, fecha actual, total y estado inicial
            $query = "INSERT INTO facturas (id_cliente, fecha, total, estado) VALUES (?, NOW(), ?, ?)";
            $stmt = $this->db->prepare($query);
            if (!$stmt->execute([$data['id_cliente'], $data['total'], 'Activa'])) {
                return false; // Retorna falso si falla la inserción
            }

            // Obtiene el ID de la factura recién creada
            $factura_id = $this->db->lastInsertId();

            // Inserta cada producto en la tabla de detalle
            $query_detalle = "INSERT INTO facturas_productos (id_factura, id_producto, cantidad_producto) VALUES (?, ?, ?)";
            $stmt_detalle = $this->db->prepare($query_detalle);
            foreach ($data['productos'] as $producto) {
                if (!$stmt_detalle->execute([$factura_id, $producto['id'], $producto['cantidad']])) {
                    return false; // Falla si alguno de los productos no se inserta
                }
            }
            return true; // Retorna verdadero si todo salió bien
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return false; // Manejo genérico de errores
        }
    }

    /**
     * Cambia el estado de una factura a "Anulado"
     */
    public function anularFactura($id)
    {
        try {
            $query = "UPDATE facturas SET estado = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['Anulado', $id]); // Retorna verdadero si la actualización es exitosa
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return false; // Manejo genérico de errores
        }
    }

    /**
     * Elimina una factura por su ID
     */
    public function eliminarFactura($id)
    {
        try {
            // Eliminar primero los productos asociados a la factura
            $query1 = "DELETE FROM facturas_productos WHERE id_factura = ?";
            $stmt1 = $this->db->prepare($query1);
            $result1 = $stmt1->execute([$id]); // Ejecutar la primera consulta

            // Si la primera eliminación fue exitosa, proceder a eliminar la factura
            if ($result1) {
                $query2 = "DELETE FROM facturas WHERE id = ?";
                $stmt2 = $this->db->prepare($query2);
                $result2 = $stmt2->execute([$id]);
                return $result2;
            }

            return false; // Si la primera eliminación falla, retornar falso
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return false; // Manejo genérico de errores
        }
    }
}
