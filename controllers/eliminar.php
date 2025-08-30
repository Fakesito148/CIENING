<?php
include "../config/conexion.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM lacteos WHERE id = $id";
    $conn->query($sql);
}

header("Location: ../lacteos.php");
exit;
?>
