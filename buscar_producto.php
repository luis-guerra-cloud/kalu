<?php
include "conexion.php";

$nombre = $_GET["nombre"] ?? "";

$sql = "SELECT * FROM productos WHERE nombre LIKE ?";
$stmt = $conn->prepare($sql);
$like = "%$nombre%";
$stmt->bind_param("s", $like);
$stmt->execute();

$result = $stmt->get_result();
$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);

$conn->close();
?>