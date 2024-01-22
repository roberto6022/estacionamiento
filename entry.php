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

// Obtener la matrícula del vehículo
$license = $_POST['license'];

// Verificar que la matrícula no esté vacía
if (empty($license)) {
    die('Por favor, introduzca la matrícula del vehículo.');
}

// Insertar el registro de entrada en la tabla de estacionamiento
$query = "INSERT INTO parking (license) VALUES ('$license')";
mysqli_query($conn, $query);

// Obtener el ID del registro recién insertado
$id = mysqli_insert_id($conn);

// Cerrar la conexión a la base de datos
mysqli_close($conn);

// Mostrar el resultado
echo "<h2>Estacionamiento confirmado</h2>";
echo "<p>ID: $id</p>";
echo "<p>Licencia: $license</p>";
echo "<p>Hora de entrada: " . date('H:i:s') . "</p>";

?>