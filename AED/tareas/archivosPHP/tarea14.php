<?php

/**
 * Lee excusas desde excusas.txt y muestra una aleatoria.
 */

 // Escritura
$archivo = fopen("resources/excusas.txt", "w");
$excusas = [
    "No pude ir a clase porque me quedé dormido.",
    "No hice la tarea porque mi perro se la comió.",
    "No asistí a la reunión porque tenía una cita médica.",
];
foreach ($excusas as $ex) {
    fwrite($archivo, $ex . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/excusas.txt", "r");
$contenido = fread($archivo, filesize("resources/excusas.txt"));
$lineas = explode("\n", trim($contenido));
fclose($archivo);

// Mostrar excusa al azar
$indiceAzar = array_rand($lineas);
echo "Excusa al azar: " . $lineas[$indiceAzar] . "\n";
