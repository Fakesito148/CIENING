<?php 
$title = "INICIO - ADMIN";
$backLink = null;
include "views/header.php"; 
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="container">

  <div class="botones-admin">
  <button class="boton" onclick="window.location.href='agregar_admin.php'">Agregar administrador</button>
  <button class="boton" onclick="window.location.href='editar_admin_menu.php'">Editar administrador</button>
  <button class="boton" onclick="window.location.href='agregar_empleado.php'">Agregar empleado</button>
  <button class="boton" onclick="window.location.href='editar_empleado_menu.php'">Editar empleado</button>
  <button class="boton" onclick="window.location.href='tickets.php'">Menú de tickets de recuperación</button>
  <button class="boton" onclick="window.location.href='login.php'">Cerrar sesión</button>
  </div>
</div>


<div class="container">
  <div class="card" onclick="window.location.href='lacteos.php'">
    <h3>Lácteos</h3>
    <p>AGREGAR</p>
  </div>
  <div class="card" onclick="window.location.href='dulces.php'">
    <h3>Dulces</h3>
    <p>AGREGAR</p>
  </div>
  <div class="card" onclick="window.location.href='galletas.php'">
    <h3>Galletas</h3>
    <p>AGREGAR</p>
  </div>
  <div class="card" onclick="window.location.href='papitas.php'">
    <h3>Papitas</h3>
    <p>AGREGAR</p>
  </div>
  <div class="card" onclick="window.location.href='variados.php'">
    <h3>Variados</h3>
    <p>AGREGAR</p>
  </div>
</div>
