<?php 

session_start();
require '../includes/validar_sesion.php';
require '../db/conexion.php';

$conexion = obtenerConexion();

$sql = "SELECT c.id, cl.nombre AS cliente, c.tipo, c.descripcion, c.total. c.fecha_creacion
FROM cotizaciones c
JOIN clientes cl ON c.cliente_id = cl.id
ORDER BY c.id DESC";

$stmt = $conexion->prepare($sql);
$stmt->execute();
$cotizaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>