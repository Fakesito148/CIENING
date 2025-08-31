<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
<link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $tipo     = $_POST['tipo'] ?? '';
    $usuario  = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

  include("config/conexion.php");

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $tabla = ($tipo == "admins") ? "admins" : "empleados";

    $usuario = mysqli_real_escape_string($conn, $usuario);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM $tabla WHERE usuario = '$usuario' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row['contraseña'] === $password) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo'] = $tipo;

         
            if ($tipo == "admins") {
                echo "<script>alert('Sesión iniciada, bienvenido Administrador'); window.location='inicio_admin.php';</script>";
            } else {
                echo "<script>alert('Sesión iniciada, bienvenido Empleado'); window.location='inicio_empleado.php';</script>";
            }
            exit();
        } else {
           
            echo "<script>alert('Contraseña incorrecta'); window.location='login.php';</script>";
        }
    } else {
       
        echo "<script>alert( 'Usuario no encontrado'); window.location='login.php';</script>";
    }
}
?>



    
  <div class="sidebar"></div> 
  <div class="login-container">
    <h1>Bienvenido</h1>

   <!-- Cambiar logo mas adelante -->
    <div class="logo">LOGO</div>

    <h2>Iniciar sesión</h2>

    <form action="login.php" method="post">
      <label for="tipo">Tipo de usuario:</label>
      <select id="tipo" name="tipo">
        <option value="admins">Administrador</option>
        <option value="usuarios">Empleado</option>
      </select>

      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" class="btn">Iniciar sesión</button>
    </form>

    <div class="forgot">
      <a href="recuperar_password.php">¿Olvidaste tu contraseña?</a>
    </div>
  </div>

</body>
</html>
