<?php
require 'includes/validar_sesion.php'; // Asegura que solo usuarios autenticados accedan
require 'includes/menu.php'; // Menú dinámico según el rol

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Dashboard - AGS</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Bienvenido al Sistema AGS</h1>

    <p>Usuario: <strong><?= $_SESSION['usuario'] ?></strong></p>
    <p>Rol: <strong><?= $_SESSION['rol'] ?></strong></p>

    <h2>Panel de Control</h2>

    <?php if ($_SESSION['rol'] === 'Administrador'): ?>
        <p><a href="clientes/listar.php">Gestión de Clientes</a></p>
        <p><a href="servicios/listar.php">Gestión de Servicios</a></p>
        <p><a href="cotizaciones/listar.php">Gestión de Cotizaciones</a></p>
        <p><a href="activos/listar.php">Gestión de Activos</a></p>
        <p><a href="reportes/listar.php">Generación de Reportes</a></p>
    <?php elseif ($_SESSION['rol'] === 'Coordinador'): ?>
        <p><a href="clientes/listar.php">Gestión de Clientes</a></p>
        <p><a href="servicios/listar.php">Gestión de Servicios</a></p>
        <p><a href="cotizaciones/listar.php">Gestión de Cotizaciones</a></p>
        <p><a href="activos/listar.php">Gestión de Activos</a></p>
        <p><a href="reportes/listar.php">Generación de Reportes</a></p>
    <?php elseif ($_SESSION['rol'] === 'Técnico'): ?>
        <p><a href="servicios/mis_ordenes.php">Mis Órdenes de Trabajo</a></p>
    <?php endif; ?>

    <p><a href="auth/logout.php">Cerrar Sesión</a></p>
</body>
</html>
