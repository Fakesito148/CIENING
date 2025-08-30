<?php
include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $sql = "UPDATE lacteos SET nombre=?, cantidad=?, estado=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $nombre, $cantidad, $estado, $id);
    $stmt->execute();

    echo "OK";
}
