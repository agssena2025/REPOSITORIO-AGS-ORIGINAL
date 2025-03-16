<?php
session_start();
require '../includes/validar_sesion.php';
require '../db/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = obtenerConexion();
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: listar.php?mensaje=Cliente eliminado correctamente");
        exit();

    } catch (PDOException $e) {
        echo "Error al eliminar el cliente: " . $e->getMessage();
    }
} else {
    echo "ID de cliente no válido. ";

}
?>

