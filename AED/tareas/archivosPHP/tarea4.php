<?php

/**
 * Guarda un array de nombres en nombres.txt (uno por línea). Después, 
 * léelo y muéstralos en lista numerada.
 */

// Escritura
$nombres = ["Pedro","Domingo","Francisco","Pepito"];
$archivo = fopen("resources/nombres.txt", "w");
for ($i=0; $i < count($nombres) ; $i++) { 
    fwrite($archivo, $nombres[$i] . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/nombres.txt", "r");
$contenido = fread($archivo, filesize("resources/nombres.txt"));
echo($contenido);
fclose($archivo);
