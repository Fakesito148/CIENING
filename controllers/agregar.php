<?php
include "../config/conexion.php";

$nombre   = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$estado   = $_POST['estado'];

// Insertar solo nombre, cantidad y estado
$sql = "INSERT INTO lacteos (nombre, cantidad, estado) 
        VALUES ('$nombre', '$cantidad', '$estado')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../lacteos.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
