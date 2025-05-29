
<?php
$servername = "localhost";
$username = "root"; // Cambia según tu configuración
$password = ""; // Cambia según tu configuración
$dbname = "kalu";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$duenio = $_POST["duenio"];
$nombre_animal = $_POST["nombre_animal"];
$especie = $_POST["especie"];
$motivo = $_POST["motivo_de_la_cita"];
$numero_telefonico = $_POST["numero_telefonico"];
$correo = $_POST["correo"];

$sql = "INSERT INTO citas (duenio, nombre_animal, especie, motivo_de_la_cita, numero_telefonico, correo) 
        VALUES ('$duenio', '$nombre_animal', '$especie', '$motivo', '$numero_telefonico', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Cita agendada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
