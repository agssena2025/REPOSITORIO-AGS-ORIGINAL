<?php
session_start();

// Verifica si hay un usuario logueado, si no, redirige al login.
if (!isset($_SESSION['usuario'])) {
    header('Location: /ags/auth/login.php');
    exit;
}
