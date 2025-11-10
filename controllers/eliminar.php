<?php
include "../config/conexion.php";

if (isset($_POST['id']) && isset($_POST['seccion'])) {
    $id = intval($_POST['id']);
    $seccion = $_POST['seccion'];

    // Definir la tabla según la sección
    $tablas = [
        'lacteos' => 'lacteos',
        'dulces'  => 'dulces',
        'galletas'=> 'galletas',
        'papitas' => 'papitas',
        'variados'=> 'variados'
    ];

    if (array_key_exists($seccion, $tablas)) {
        $tabla = $tablas[$seccion];
        $sql = "DELETE FROM $tabla WHERE id = $id";
        $conn->query($sql);
    }
}

// Redirigir a la página correspondiente
header("Location: ../{$seccion}.php");
exit;
?>
