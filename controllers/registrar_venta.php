<?php
include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cantidad_vendida = $_POST['cantidad'];
    $seccion = $_POST['seccion']; // p. ej. "lacteos"

    // Restar la cantidad vendida
    $sql = "UPDATE $seccion SET cantidad = GREATEST(cantidad - ?, 0) WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cantidad_vendida, $id);
    $stmt->execute();

    header("Location: ../" . $seccion . "_empleado.php");
    exit;
}
?>
