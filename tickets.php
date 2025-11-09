<?php 
$title = "Lista de Tickets de Recuperación";
include "views/header.php"; 
include("config/conexion.php");

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}


if (isset($_GET['cambiar_estado'])) {
    $id = $_GET['cambiar_estado'];
    $sql = "SELECT estado FROM tickets_recuperacion WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
        $nuevo_estado = ($ticket['estado'] == 'PENDIENTE') ? 'COMPLETADO' : 'PENDIENTE';

        $sql_update = "UPDATE tickets_recuperacion SET estado='$nuevo_estado' WHERE id='$id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "<script>
                    alert('Estado cambiado a $nuevo_estado correctamente');
                    window.location='tickets.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Error al cambiar el estado');</script>";
        }
    }
}


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql_delete = "DELETE FROM tickets_recuperacion WHERE id='$id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>
                alert('Ticket eliminado correctamente');
                window.location='listar_tickets.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Error al eliminar el ticket');</script>";
    }
}

$sql = "SELECT * FROM tickets_recuperacion ORDER BY id ASC";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="container" style="flex-direction: column; align-items: center; margin-top: 50px;">
    <h1 style="color:#c00;">Lista de Tickets de Recuperación</h1>

    <div style="margin-top:20px;">
        <a href="inicio_admin.php" class="btn-volver">Volver al inicio</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" 
           style="border-collapse: collapse; width: 90%; margin-top: 20px; text-align:center;">
        <thead style="background-color:#c00; color:white;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Estado</th>
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
                        <td><?= htmlspecialchars($row['tipo']) ?></td>
                        <td><?= htmlspecialchars($row['usuario']) ?></td>
                        <td><?= htmlspecialchars($row['correo']) ?></td>
                        <td><?= htmlspecialchars($row['fecha']) ?></td>
                        <td>
                            <?php if ($row['estado'] == 'PENDIENTE'): ?>
                                <span style="color: red; font-weight:bold;">PENDIENTE</span>
                            <?php else: ?>
                                <span style="color: green; font-weight:bold;">COMPLETADO</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?cambiar_estado=<?= $row['id'] ?>" 
                               class="editar-btn"
                               onclick="return confirm('¿Deseas cambiar el estado de este ticket?');">
                               Cambiar estado
                            </a>
                            <a href="?eliminar=<?= $row['id'] ?>" 
                               class="eliminar" 
                               onclick="return confirm('¿Seguro que deseas eliminar este ticket?');">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No hay tickets registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>
