<?php
include "config/conexion.php";
$title = "LÁCTEOS - EMPLEADO";
$backLink = "inicio_empleado.php";
include "views/header.php";

$sql = "SELECT * FROM lacteos";
$result = $conn->query($sql);
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="container-empleado">

  <div class="card-product-empleado">
    <h2>Inventario de Lácteos</h2>
    <table class="tabla-empleado">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Estado</th>
        <th>Registrar venta</th>
      </tr>

      <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td><?php echo htmlspecialchars($row['estado']); ?></td>
        <td>
          <form method="POST" action="controllers/registrar_venta.php" class="form-venta">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="seccion" value="lacteos">
            <input type="number" name="cantidad" placeholder="Cantidad" min="1" required class="input-cantidad">
            <button type="submit" class="btn-registrar">Registrar</button>
          </form>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>

  <button class="btn-volver" onclick="window.location.href='inicio_empleado.php'">Volver</button>
</div>
