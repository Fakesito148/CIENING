<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['rol'] !== 'admin') {
    header("Location: empleado.php");
    exit();
}
?>
    
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("config/conexion.php");

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "DELETE FROM empleados WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Empleado eliminado correctamente');
                window.location='editar_empleado_menu.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al eliminar: " . $conn->error . "');
                window.location='editar_empleado_menu.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID no especificado');
            window.location='inicio_admin.php';
          </script>";
}

$conn->close();
?>

