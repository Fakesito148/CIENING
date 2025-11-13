<?php 
$title = "INICIO - EMPLEADO";
$backLink = null;
include "views/header.php"; 
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="container">
  <div class="botones-admin">
    <button class="boton" onclick="window.location.href='login.php'">Cerrar sesión</button>
  </div>
</div>

<div class="container">
  <div class="card" onclick="window.location.href='lacteos_empleado.php'">
    <h3>Lácteos</h3>
    <p>VER / VENDER</p>
  </div>
  <div class="card" onclick="window.location.href='dulces_empleado.php'">
    <h3>Dulces</h3>
    <p>VER / VENDER</p>
  </div>
  <div class="card" onclick="window.location.href='galletas_empleado.php'">
    <h3>Galletas</h3>
    <p>VER / VENDER</p>
  </div>
  <div class="card" onclick="window.location.href='papitas_empleado.php'">
    <h3>Papitas</h3>
    <p>VER / VENDER</p>
  </div>
  <div class="card" onclick="window.location.href='variados_empleado.php'">
    <h3>Variados</h3>
    <p>VER / VENDER</p>
  </div>
  <div class="card" onclick="window.location.href='registro_ventas.php'">
    <h3>Registro de Ventas</h3>
    <p>VER HISTORIAL</p>
  </div>
</div>
