<?php
include('../db/conexion.php');

$id = $_GET['id'];
$conexion = obtenerConexion(); // Conexión con PDO

try {
    // Consulta SQL ajustada según la columna 'id' de la tabla 'clientes'
    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: listar.php?mensaje=Cliente eliminado correctamente");
    exit();
} catch (PDOException $e) {
    echo "Error al eliminar el cliente: " . $e->getMessage();
}
?>
