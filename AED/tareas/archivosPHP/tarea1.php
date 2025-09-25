<?php 

/**
 * Enunciado: Crea un fichero datos.txt con el texto "Hola Mundo desde PHP" y, a continuación, léelo y muestra su contenido por pantalla.
 * Funciones/Comandos sugeridos: file_put_contents, file_get_contents
 */

 // Escritura
$file = fopen("resources/datos.txt", "w");
fwrite($file, "Hola Mundo desde PHP");
fclose($file);

// Lectura
$file = fopen("resources/datos.txt", "r");
echo fread($file, filesize("resources/datos.txt"));
fclose($file);