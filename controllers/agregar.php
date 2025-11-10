<?php
include "../config/conexion.php";

if (isset($_POST['nombre'], $_POST['cantidad'], $_POST['estado'], $_POST['seccion'])) {
    $nombre = $_POST['nombre'];
    $cantidad = intval($_POST['cantidad']);
    $estado = $_POST['estado'];
    $seccion = $_POST['seccion'];

    // Mapear sección a tabla
    $tablas = [
        'lacteos' => 'lacteos',
        'dulces'  => 'dulces',
        'galletas'=> 'galletas',
        'papitas' => 'papitas',
        'variados'=> 'variados'
    ];

    if (array_key_exists($seccion, $tablas)) {
        $tabla = $tablas[$seccion];
        $sql = "INSERT INTO $tabla (nombre, cantidad, estado) VALUES ('$nombre', $cantidad, '$estado')";
        $conn->query($sql);
    }
}

// Redirigir a la página correspondiente
header("Location: ../$seccion.php");
exit;
?>
