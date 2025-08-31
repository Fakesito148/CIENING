<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>

<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo    = $_POST['tipo'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $correo  = $_POST['correo'] ?? '';

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "abarrotes"; 

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $tabla = ($tipo == "admins") ? "admins" : "empleados";

    $usuario = mysqli_real_escape_string($conn, $usuario);
    $correo  = mysqli_real_escape_string($conn, $correo);

    $sql = "SELECT * FROM $tabla WHERE usuario = '$usuario' AND correo = '$correo' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $fecha = date("Y-m-d"); 
   $sql_insert = "INSERT INTO tickets_recuperacion (tipo, usuario, correo, fecha) VALUES ('$tipo', '$usuario', '$correo', '$fecha')";





        if ($conn->query($sql_insert) === TRUE) {
            echo "<script>alert('Solicitud de recuperación enviada. Un administrador estará en contacto contigo pronto por medio de tu correo.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error al registrar la solicitud'); window.location='recuperar_password.php';</script>";
        }

    } else {
        echo "<script>alert('Usuario o correo no encontrado'); window.location='recuperar_password.php';</script>";
    }

    $conn->close();
}
?>

<div class="sidebar"></div> 
<div class="login-container">
    <h1>Recuperar contraseña</h1>

    <form action="recuperar_password.php" method="post">
        <label for="tipo">Tipo de usuario:</label>
        <select id="tipo" name="tipo" required>
            <option value="admins">Administrador</option>
            <option value="empleados">Empleado</option>
        </select>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <button type="submit" class="btn">Enviar solicitud</button>
    </form>

    <div class="forgot">
      <a href="login.php">Regresar al login</a>
    </div>
</div>

</body>
</html>
