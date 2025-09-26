<?php

/**
 * Elige una palabra de palabras.txt y muestra solo 2 letras, el usuario debe adivinarla.
 */

// Escritura
$archivo = fopen("resources/palabras.txt", "w");
$palabras = ["elefante", "cocodrilo", "jirafa", "hipopótamo", "rinoceronte"];
for ($i = 0; $i < count($palabras); $i++) {
    fwrite($archivo, $palabras[$i] . "\n");
}
fclose($archivo);

// Lectura

$archivo = fopen("resources/palabras.txt", "r");
$contenido = fread($archivo, filesize("resources/palabras.txt"));
$lineas = explode("\n", trim($contenido));
echo $contenido . "\n";
fclose($archivo);


