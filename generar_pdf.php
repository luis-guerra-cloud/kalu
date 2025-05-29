<?php
require('fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kalu";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta todos los registros de la tabla citas
$sql = "SELECT * FROM citas";
$result = $conn->query($sql);

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Listado de Citas - Veterinaria KALU', 0, 1, 'C');
$pdf->Ln(10);

// Encabezados
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Dueño', 1);
$pdf->Cell(30, 10, 'Animal', 1);
$pdf->Cell(30, 10, 'Especie', 1);
$pdf->Cell(60, 10, 'Motivo', 1);
$pdf->Cell(40, 10, 'Teléfono', 1);
$pdf->Ln();

// Contenido
$pdf->SetFont('Arial', '', 10);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(30, 10, $row['duenio'], 1);
        $pdf->Cell(30, 10, $row['nombre_animal'], 1);
        $pdf->Cell(30, 10, $row['especie'], 1);
        $pdf->Cell(60, 10, $row['motivo_de_la_cita'], 1);
        $pdf->Cell(40, 10, $row['numero_telefonico'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron citas.', 1, 1, 'C');
}

$conn->close();

// Salida del PDF
$pdf->Output('citas_kalu.pdf', 'I'); // 'I' para mostrar en navegador
?>
