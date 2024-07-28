<?php
include 'conexion.php'; // Archivo con la conexión a DB creada con anterioridad

// Validación de datos
$origen = isset($_POST['origen']) ? $_POST['origen'] : '';
$destino = isset($_POST['destino']) ? $_POST['destino'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

// Verificar que los datos no estén vacíos
if(empty($origen) || empty($destino) || empty($fecha)) {
    die("Por favor complete todos los campos.");
}

// Preparar consulta
$stmt = $pdo->prepare("SELECT * FROM VUELO WHERE origen = ? AND destino = ? AND fecha = ?");
$stmt->execute([$origen, $destino, $fecha]);

// Mostrar resultados
echo "<h2>Vuelos disponibles:</h2>";
echo "<table border='1'>";
echo "<tr><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas Disponibles</th><th>Precio</th></tr>";

while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['origen']) . "</td>";
    echo "<td>" . htmlspecialchars($row['destino']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
    echo "<td>" . htmlspecialchars($row['plazas_disponibles']) . "</td>";
    echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
