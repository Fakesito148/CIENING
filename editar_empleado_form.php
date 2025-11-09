<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Empleado</title>
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>

<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("config/conexion.php");
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<script>
            alert('ID de empleado no especificado');
            window.location='inicio_admin.php';
          </script>";
    exit;
}

$sql = "SELECT * FROM empleados WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>
            alert('Empleados no encontrados');
            window.location='inicio_admin.php';
          </script>";
    exit;
}

$admin = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre     = $_POST['nombre'] ?? '';
    $apellido   = $_POST['apellido'] ?? '';
    $usuario    = $_POST['usuario'] ?? '';
    $correo     = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $confirmar  = $_POST['confirmar_contraseña'] ?? '';

  
    if (!empty($contraseña) && $contraseña !== $confirmar) {
        echo "<script>
                alert('Las contraseñas no coinciden');
              </script>";
    } else {
      
        if (empty($contraseña)) {
            $sql_update = "UPDATE empleados 
                           SET nombre='$nombre', apellido='$apellido', usuario='$usuario', correo='$correo' 
                           WHERE id='$id'";
        } else {
           
            $sql_update = "UPDATE empleados
                           SET nombre='$nombre', apellido='$apellido', usuario='$usuario', contraseña='$contraseña', correo='$correo' 
                           WHERE id='$id'";
        }

        if ($conn->query($sql_update) === TRUE) {
            echo "<script>
                    alert('Empleado actualizado correctamente');
                    window.location='inicio_admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al actualizar: " . $conn->error . "');
                  </script>";
        }
    }
}
$conn->close();
?>

<div class="sidebar"></div>
<div class="recuperar-container">
    <h1>Editar Empleado</h1><br>

    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($admin['nombre']) ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($admin['apellido']) ?>" required>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($admin['usuario']) ?>" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Colocar la nueva contraseña">

        <label for="confirmar_contraseña">Confirmar contraseña:</label>
        <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" placeholder="Confirmar la contraseña">

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($admin['correo']) ?>" required>

        <button type="submit" class="btn">Actualizar Empelado</button>
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
