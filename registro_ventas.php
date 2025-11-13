<?php
include "config/conexion.php";

$title = "Registro de Ventas - EMPLEADO";
$backLink = "inicio_empleado.php";
include "views/header.php";

$secciones = ['lacteos', 'dulces', 'galletas', 'papitas', 'variados'];

$ventas = [];

foreach ($secciones as $seccion) {
    $sql = "SELECT v.id, v.seccion, v.cantidad, v.fecha, p.nombre AS producto
            FROM ventas v
            JOIN $seccion p ON v.producto_id = p.id
            WHERE v.seccion = '$seccion'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ventas[] = $row;
        }
    }
}
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="container-empleado">
    <div class="card-product-empleado">
        <h2>Registro de Ventas</h2>
        <table class="tabla-empleado">
            <tr>
                <th>ID</th>
                <th>Sección</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>

            <?php if (!empty($ventas)): ?>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['id'] ?></td>
                        <td><?= htmlspecialchars($venta['seccion']) ?></td>
                        <td><?= htmlspecialchars($venta['producto']) ?></td>
                        <td><?= $venta['cantidad'] ?></td>
                        <td><?= $venta['fecha'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay ventas registradas</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <button class="btn-volver" onclick="window.location.href='inicio_empleado.php'">Volver</button>
</div>
