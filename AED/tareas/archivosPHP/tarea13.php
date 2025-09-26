<?php

/**
 * Guarda títulos en canciones.txt y muestra uno al azar.
 */


// Escritura
$titulos = ["Imagine", "Bohemian Rhapsody", "Stairway to
    Heaven", "Hotel California", "Sweet Child O' Mine"];

$archivo = fopen("resources/canciones.txt", "w");
for ($i = 0; $i < count($titulos); $i++) {
    fwrite($archivo, $titulos[$i] . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/canciones.txt", "r");
$contenido = fread($archivo, filesize("resources/canciones.txt"));
$lineas = explode("\n", trim($contenido));
fclose($archivo);

// Mostrar título al azar
$indiceAzar = array_rand($lineas);
echo "Título al azar: " . $lineas[$indiceAzar] . "\n";
