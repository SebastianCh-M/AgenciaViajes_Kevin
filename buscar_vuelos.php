<?php
include 'conexion.php'; // Archivo con la conexión a DB creada con anterioridad

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];

$stmt = $pdo->prepare("SELECT * FROM VUELO WHERE origen = ? AND destino = ? AND fecha = ?");
$stmt->execute([$origen, $destino, $fecha]);

echo "<h2>Vuelos disponibles:</h2>";
echo "<table border='1'>";
echo "<tr><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas Disponibles</th><th>Precio</th></tr>";

while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $row['origen'] . "</td>";
    echo "<td>" . $row['destino'] . "</td>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "<td>" . $row['plazas_disponibles'] . "</td>";
    echo "<td>" . $row['precio'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
