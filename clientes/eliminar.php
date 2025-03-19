<?php
session_start();
require '../includes/validar_sesion.php';
require '../db/conexion.php';

$id_cliente = $_GET['id'];
$conexion = obtenerConexion(); // Conexión con PDO

try {
    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id = :id_cliente");
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->execute();

    header("Location: listar.php?mensaje=Cliente eliminado correctamente");
    exit();
} catch (PDOException $e) {
    echo "Error al eliminar el cliente: " . $e->getMessage();
}
?>
