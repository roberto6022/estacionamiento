<?php

// Conectar a la base de datos
$host = 'localhost';
$user = 'usuario';
$password = 'contraseña';
$dbname = 'estacionamiento';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Obtener el ID del registro de estacionamiento
$id = $_POST['id'];

// Verificar que el ID no esté vacío
if (empty($id)) {
    die('Por favor, introduzca el ID del registro de estacionamiento.');
}

// Obtener la hora de salida
$exit_time = date('Y-m-d H:i:s');

// Calcular la duración de la estancia
$query = "SELECT TIMESTAMPDIFF(HOUR, entry_time, '$exit_time') AS duration FROM parking WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$duration = $row['duration'];

// Calcular el costo de la estancia
$cost = $duration * 5;

// Actualizar el registro de estacionamiento con la hora de salida y el costo
$query = "UPDATE parking SET exit_time = '$exit_time', duration = $duration, cost = $cost WHERE id = $id";
mysqli_query($conn, $query);

// Cerrar la conexión a la base de datos
mysqli_close($conn);

// Mostrar el resultado
echo "<h2>Estacionamiento finalizado</h2>";
echo "<p>ID: $id</p>";
echo "<p>Licencia: " . $_POST['license'] . "</p>";
echo "<p>Hora de salida: " . $exit_time . "</p>";
echo "<p>Duración: $duration horas</p>";
echo "<p>Costo: $cost</p>";

?>