<?php


/**
 * Guarda entradas con fecha y hora en diario.txt. Luego muéstralas todas.
 */


// Escritura
date_default_timezone_set('Europe/Madrid');
$archivo = fopen("resources/diario.txt", "a");
$entrada = "Entrada del " . date("d/m/Y") . " a las " . date("H:i:s") . "\n";
fwrite($archivo, $entrada);
fclose($archivo);  

// Lectura
$archivo = fopen("resources/diario.txt", "r");
$contenido = fread($archivo, filesize("resources/diario.txt"));
echo($contenido);
fclose($archivo);
