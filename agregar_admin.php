<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Verificar si el usuario es administrador
if ($_SESSION['tipo'] !== 'admins') {
    header("Location: inicio_empleado.php");
    exit();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

include("config/conexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre     = $_POST['nombre'] ?? '';
    $apellido   = $_POST['apellido'] ?? '';
    $usuario    = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $correo     = $_POST['correo'] ?? '';

    $sql = "INSERT INTO admins (nombre, apellido, usuario, contraseña, correo)
            VALUES ('$nombre', '$apellido', '$usuario', '$contraseña', '$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Administrador agregado correctamente');
                window.location='inicio_admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al agregar el administrador: " . $conn->error . "');
                window.location='agregar_admin.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Administrador</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
    <script>
        function validar_contraseña() {
            const pass1 = document.getElementById("contraseña").value;
            const pass2 = document.getElementById("confirmar_contraseña").value;

            if (pass1 !== pass2) {
                alert("Las contraseñas no coinciden. Intenta nuevamente.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<div class="sidebar"></div> 
<div class="recuperar-container">
    <h1>Agregar Administrador</h1><br>
    
    <form action="agregar_admin.php" method="post" onsubmit="return validar_contraseña()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>

        <label for="confirmar_contraseña">Confirmar contraseña:</label>
        <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <button type="submit" class="btn">Agregar Administrador</button>
    </form>

    <br>
    <div class="forgot">
        <div class="back-login">
            <a href="inicio_admin.php" class="link">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12l14 0" />
                    <path d="M5 12l4 4" />
                    <path d="M5 12l4 -4" />
                </svg>
                Volver al menú principal
            </a>
        </div>
    </div>
</div>

</body>
</html>
