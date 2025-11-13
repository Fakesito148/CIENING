<?php
include "../config/conexion.php";

// Validar que sea POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $cantidad_vendida = $_POST['cantidad'];
    $seccion = $_POST['seccion']; // ej. "lacteos"

    // Validar que la sección sea válida
    $secciones_validas = ['lacteos','papitas','galletas','dulces','variados'];
    if (!in_array($seccion, $secciones_validas)) {
        die("Sección no válida");
    }

    // 1️⃣ Actualizar la tabla de productos
    $sql = "UPDATE $seccion SET cantidad = GREATEST(cantidad - ?, 0) WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cantidad_vendida, $id);
    $stmt->execute();

    // 2️⃣ Insertar registro en la tabla ventas
    $sql_ventas = "INSERT INTO ventas (producto_id, seccion, cantidad, fecha) VALUES (?, ?, ?, NOW())";
    $stmt2 = $conn->prepare($sql_ventas);
    $stmt2->bind_param("isi", $id, $seccion, $cantidad_vendida);
    $stmt2->execute();

    // Redirigir de vuelta a la sección correspondiente
    header("Location: ../" . $seccion . "_empleado.php");
    exit;
}
?>
