<?php

/**
 * Almacena en numeros.txt los números del 1 al 10 (cada número en una línea). Luego léelo y muestra todos los números.
 * Funciones sugeridas: fopen, fwrite, fclose, file
 */

// Escritura
$path = "resources/numeros.txt";
$archivo = fopen($path, "w");
for ($i = 1; $i < 11; $i++) {
    fwrite($archivo, "$i\n");
}
fclose($archivo);

//lectura
$archivo = fopen($path, "r");
$contenido = fread($archivo, filesize($path));
fclose($archivo);

echo($contenido);


