<?php
include "conexion.php";

$data = json_decode(file_get_contents("php://input"), true);
$nombre = $data["nombre"];
$precio = $data["precio"];
$descripcion = $data["descripcion"];

$sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sds", $nombre, $precio, $descripcion);

if ($stmt->execute()) {
    echo "Producto guardado correctamente.";
} else {
    echo "Error al guardar: " . $conn->error;
}

$conn->close();
?>