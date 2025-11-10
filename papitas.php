<?php
include "config/conexion.php";
$title = "PAPITAS - ADMIN";
$backLink = "inicio_admin.php";
include "views/header.php"; 
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="container">
  <?php
  $sql = "SELECT * FROM papitas";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) { ?>
    <div class="card-product" id="card-<?php echo $row['id']; ?>">
      <img src="assets/images/<?php echo strtolower($row['nombre']); ?>.png" alt="<?php echo $row['nombre']; ?>">
      <h3 class="nombre"><?php echo $row['nombre']; ?></h3>
      
      <div class="input-box">
        <label>Restantes:</label>
        <span class="cantidad"><?php echo $row['cantidad']; ?></span>
      </div>
      
      <div class="estado">Estado: <span class="estado-text"><?php echo $row['estado']; ?></span></div>
      
      <button class="editar-btn" onclick="toggleEdit(<?php echo $row['id']; ?>)">EDITAR</button>
      
      <form method="POST" action="controllers/eliminar.php" style="display:inline-block;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="seccion" value="papitas">
        <button type="submit" class="eliminar">ELIMINAR</button>
      </form>
      
      <div class="edit-form" id="edit-form-<?php echo $row['id']; ?>" style="display:none; margin-top:10px;">
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" id="nombre-<?php echo $row['id']; ?>">
        <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>" id="cantidad-<?php echo $row['id']; ?>">
        <input type="text" name="estado" value="<?php echo $row['estado']; ?>" id="estado-<?php echo $row['id']; ?>">
        <button onclick="guardarCambios(<?php echo $row['id']; ?>, 'papitas')">GUARDAR</button>
        <button onclick="cancelarEdit(<?php echo $row['id']; ?>)">CANCELAR</button>
      </div>
    </div>
  <?php } ?>
</div>

<div class="form-agregar card-product">
  <h2>Agregar nueva papita</h2>
  <form action="controllers/agregar.php" method="POST">
    <input type="hidden" name="seccion" value="papitas">
    <input type="text" name="nombre" placeholder="Nombre de la papita" required>
    <input type="number" name="cantidad" placeholder="Cantidad" required>
    <input type="text" name="estado" placeholder="Estado (Disponible/Agotado)" required>
    <button type="submit" class="btn-agregar">AGREGAR</button>
  </form>
</div>

<script src="assets/js/editar.js"></script>
