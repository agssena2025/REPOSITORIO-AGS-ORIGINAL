<?php
if (!isset($_SESSION['usuario'])) {
    header('Location: /ags/auth/login.php');
    exit;
}

$rol = $_SESSION['rol'];
?>

<nav>
    <ul>
        <li><a href="/ags/index.php">Inicio</a></li>

        <?php if ($rol === 'Administrador' || $rol === 'Coordinador'): ?>
            <li><a href="/ags/clientes/listar.php">Gestión de Clientes</a></li>
            <li><a href="/ags/servicios/listar.php">Gestión de Servicios</a></li>
            <li><a href="/ags/cotizaciones/listar.php">Gestión de Cotizaciones</a></li>
            <li><a href="/ags/activos/listar.php">Gestión de Activos</a></li>
            <li><a href="/ags/reportes/listar.php">Generar Reportes</a></li>
        <?php endif; ?>

        <?php if ($rol === 'Técnico'): ?>
            <li><a href="/ags/servicios/mis_ordenes.php">Órdenes Asignadas</a></li>
        <?php endif; ?>

        <li><a href="/ags/auth/logout.php">Cerrar sesión</a></li>
    </ul>
</nav>
