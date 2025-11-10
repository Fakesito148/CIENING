<?php
include "../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $tabla = $_POST['seccion']; // tabla enviada desde JS

    // Validar que sea una tabla permitida
    $tablas_permitidas = ['lacteos','dulces','galletas','papitas','variados'];
    if(!in_array($tabla, $tablas_permitidas)){
        echo "ERROR: tabla no permitida";
        exit;
    }

    $sql = "UPDATE $tabla SET nombre=?, cantidad=?, estado=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        echo "ERROR: ".$conn->error;
        exit;
    }
    $stmt->bind_param("sisi", $nombre, $cantidad, $estado, $id);
    $stmt->execute();

    echo "OK";
}
?>
