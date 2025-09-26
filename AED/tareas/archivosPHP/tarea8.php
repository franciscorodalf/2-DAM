<?php

/**
 * Genera la tabla del 5 y guárdala en tabla5.txt. Luego muéstrala.
 */


// Escritura
$archivo = fopen("resources/tabla5.txt", "w");
for ($i = 1; $i <= 10; $i++) {
    $resultado = 5 * $i;
    fwrite($archivo, "5 x $i = $resultado\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/tabla5.txt", "r");
$contenido = fread($archivo, filesize("resources/tabla5.txt"));
echo($contenido);
fclose($archivo);
