<?php

/**
 * Copia el contenido de origen.txt en un archivo copia.txt.
 */

// Escritura
$archivoCopia = fopen("resources/copia.txt", "w");
$archivo = fopen("resources/origen.txt", "r");
fwrite($archivo, "Este es el contenido del archivo de origen.");
$contenidoOrigen = fread($archivo, filesize("resources/origen.txt"));
fwrite($archivoCopia, $contenidoOrigen);
fclose($archivo);
fclose($archivoCopia);


// Lectura
$archivo = fopen("resources/origen.txt", "r");
$contenido = fread($archivo, filesize("resources/origen.txt"));
echo $contenido;
fclose($archivo);

