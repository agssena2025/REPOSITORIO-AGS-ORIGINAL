<?php
session_start();

require '../db/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID de servicio no proporcionado.";
    exit;
}

$conexion = obtenerConexion(); //para conectar con la base de datos

$stmt = $conexion->prepare("DELETE FROM servicios WHERE id = ?");
$stmt->execute([$id]);

if ($stmt->rowCount() > 0) {
    echo "Servicio eliminado correctamente.";
    
} else {
    echo "No se encontró el servicio o no se pudo eliminar.";
}

$conexion = null;


?>