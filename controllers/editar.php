<?php
include "../config/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM lacteos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    header("Location: ../inicio_admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $sql = "UPDATE lacteos SET nombre=?, cantidad=?, estado=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $nombre, $cantidad, $estado, $id);
    $stmt->execute();

    header("Location: ../inicio_admin.php");
    exit;
}
?>

<h2>Editar producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
    
    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>">
    
    <label>Estado:</label>
    <input type="text" name="estado" value="<?php echo $row['estado']; ?>">

    <button type="submit">Guardar cambios</button>
</form>
