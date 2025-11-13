<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['rol'] !== 'empleado') {
    header("Location: agregar_admin.php"); // o administrador.php si existe
    exit();
}
?>
    
<?php 
$title = "Editar Empleados";
include "views/header.php"; 
include("config/conexion.php");

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM empleados ORDER BY id ASC";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="container" style="flex-direction: column; align-items: center; margin-top: 50px;">
    <h1 style="color:#c00;">Lista de Empleados</h1>
    <div style="margin-top:20px;">
        <a href="inicio_admin.php" class="btn-volver">Volver al inicio</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 80%; margin-top: 20px; text-align:center;">
        <thead style="background-color:#c00; color:white;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['nombre']) ?></td>
                        <td><?= htmlspecialchars($row['apellido']) ?></td>
                        <td><?= htmlspecialchars($row['usuario']) ?></td>
                                <td>•••••••••</td>
                        <td><?= htmlspecialchars($row['correo']) ?></td>
                        <td>
                            <a href="editar_empleado_form.php?id=<?= $row['id'] ?>" class="editar-btn">Editar</a>
                            <a href="eliminar_empleado.php?id=<?= $row['id'] ?>" class="eliminar" onclick="return confirm('¿Seguro que deseas eliminar este empleado?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay empleados registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    
</div>

<?php $conn->close(); ?>

