<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Médicas para Perros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEEB; /* Azul cielo */
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 20px;
            background-color: #007FFF;
            color: white;
        }
        section {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #007FFF;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007FFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005F9F;
        }
    </style>
</head>
<body>
    <header>
        <h1>Citas Médicas para animales</h1>
    </header>
    <section>
        <h2>agenda tu cita </h2>
      
    <script>
        function validarFormulario() {
            let nombreDuenio = document.getElementById("duenio").value;
            let nombreAnimal = document.getElementById("nombre_animal").value;
            let especie = document.getElementById("especie").value;
            let motivo = document.getElementById("motivo").value;
            let telefono = document.getElementById("telefono").value;
            let correo = document.getElementById("correo").value;let telefonoRegex = /^\d{10}$/;
        let correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (nombreDuenio.trim() === "" || nombreAnimal.trim() === "" || especie.trim() === "" || motivo.trim() === "") {
            alert("Todos los campos son obligatorios.");
            return false;
        }
        if (!telefonoRegex.test(telefono)) {
            alert("El número telefónico debe contener 10 dígitos.");
            return false;
        }
        if (!correoRegex.test(correo)) {
            alert("Ingrese un correo válido.");
            return false;
        }
        return true;
    }
</script>


    <h2>Agendar Cita</h2>
    <form action="guardar_cita.php" method="POST" onsubmit="return validarFormulario()">
        <label>Nombre del Dueño:</label>
        <input type="text" id="duenio" name="duenio" required><br><label>Nombre del Animal:</label>
    <input type="text" id="nombre_animal" name="nombre_animal" required><br>

    <label>Especie:</label>
    <input type="text" id="especie" name="especie" required><br>

    <label>Motivo de la Cita:</label>
    <textarea id="motivo" name="motivo_de_la_cita" required></textarea><br>

    <label>Número Telefónico:</label>
    <input type="text" id="telefono" name="numero_telefonico" required><br>

    <label>Correo:</label>
    <input type="email" id="correo" name="correo" required><br>

    <input type="submit" value="Agendar Cita">
</form>


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

$sql = "INSERT INTO citas (dueño, nombre_animal, especie, motivo_de_la_cita, numero_telefonico, correo) 
        VALUES ('$duenio', '$nombre_animal', '$especie', '$motivo', '$numero_telefonico', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Cita agendada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


        <h2>Documentos Necesarios</h2>
        <ul>
            <li>Registro médico del perro.</li>
            <li>Vacunas actualizadas.</li>
            <li>Formulario de consentimiento si es necesario.</li>
        </ul>

        <h2>Imagen Representativa</h2>
        <img src="WhatsApp Image 2025-03-27 at 10.16.06 PM.jpeg" alt="Ejemplo de cita médica para perros">

        <button onclick="history.back()">Volver Atrás</button>
    </section>
</body>
</html>
