<?php

// Obtener los datos del formulario
$license = $_POST['license'];
$duration = $_POST['duration'];
$card = $_POST['card'];

// Verificar que los datos no estén vacíos
if (empty($license) || empty($duration) || empty($card)) {
    die('Por favor, complete todos los campos.');
}

// Verificar que la duración sea un número entero entre 1 y 10
if (!is_int($duration) || $duration < 1 || $duration > 10) {
    die('La duración debe ser un número entero entre 1 y 10.');
}

// Verificar que el número de tarjeta de crédito tenga 16 dígitos
if (strlen($card) != 16) {
    die('El número de tarjeta de crédito debe tener 16 dígitos.');
}

// Verificar que el número de tarjeta de crédito sea válido
// (en un sistema real, se debería utilizar una biblioteca de verificación de tarjetas de crédito)
if (!preg_match('/^[0-9]+$/', $card)) {
    die('El número de tarjeta de crédito no es válido.');
}

// Calcular el costo de la estancia
$cost = $duration * 5;

// Mostrar el resultado
echo "<h2>Estacionamiento confirmado</h2>";
echo "<p>Licencia: $license</p>";
echo "<p>Duración: $duration horas</p>";
echo "<p>Costo: $cost</p>";

// En un sistema real, se debería procesar el pago en este punto
// (por ejemplo, enviando los datos a un procesador de pagos)

?>