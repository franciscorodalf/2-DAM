<?php

/**
 * Guarda los nombres recibidos de usuarios.txt (cada nombre en una línea). Luego muéstralos.
 * Funciones sugeridas: fopen, fwrite, file
 */

// Escritura
$usuarios = ["Ana","Luis","María","Jorge"];
$archivo = fopen("resources/usuarios.txt", "w");
for ($i=0; $i < count($usuarios) ; $i++) {
    fwrite($archivo, $usuarios[$i] . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/usuarios.txt", "r");
$contenido = fread($archivo, filesize("resources/usuarios.txt"));
echo($contenido);
fclose($archivo);
