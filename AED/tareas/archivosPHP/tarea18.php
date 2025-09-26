<?php

/**
 * Guarda respuestas de usuarios en comidas.txt y genera ranking.
 */

// Escritura
$comidas = ["Paella", "Tortilla", "Pizza", "Hamburguesa", "Ensalada"];
$archivo = fopen("resources/comidas.txt", "a");
for ($i = 0; $i < count($comidas); $i++) {
    fwrite($archivo, $comidas[$i] . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/comidas.txt", "r");
$contenido = fread($archivo, filesize("resources/comidas.txt"));
$lineas = explode("\n", trim($contenido));
echo  $contenido . "\n";
fclose($archivo);
