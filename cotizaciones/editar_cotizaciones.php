<?php 

session_start();

require '../db/conexion.php';
require '../includes/validar_sesion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID no proporcionado";
    exit;
}

//codigo para obtener datos actuales de la cotizacion.

$sql = "SELECT * FROM cotizaciones  WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    echo "Cotización no encontrada";
    exit;
}

$cotizacion = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $servicio = $_POST['servicio'];
    $valor = $_POST['valor'];

    $sqlUpdate = "UPDATE cotizaciones SET cliente = ?, servicio = ?, valor = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssdi", $cliente, $servicio, $valor, $id);

    if ($stmtUpdate->execute()) {
        header("Location: listar_cotizaciones.php");
        exit;
    } else {
        echo "Error al actualizar la cotización.";
    }
}

?>

<?php include '../includes/menu.php'; ?>

<h2>Editar cotizaciones </h2>
<form method="post">
    <label>Cliente:</label>
    <input type="text" name="cliente" value="<?= htmlspecialchars($cotizacion['cliente']) ?>" required><br>

    <label>Servicio:</label>
    <input type="text" name="servicio" value="<?= htmlspecialchars($cotizacion['servicio']) ?>" required><br>

    <label>Valor:</label>
    <input type="text" name="valor" value="<?= htmlspecialchars($cotizacion['valor']) ?>" required><br>

    <button type="submit">Guardar cambios</button>
</form>