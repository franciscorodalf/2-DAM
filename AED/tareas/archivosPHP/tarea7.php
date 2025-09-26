<?php

/**
 * Guarda números separados por comas en datos_numericos.txt. Léelos y calcula su suma.
 * Funciones sugeridas: file_get_contents, explode, array_sum
 */

// Escritura
$archivo = fopen("resources/datos_numericos.txt", "w");
fwrite($archivo, "10,20,30,40,50");
fclose($archivo);

// Lectura
$archivo = fopen("resources/datos_numericos.txt", "r");
$contenido = fread($archivo, filesize("resources/datos_numericos.txt"));
fclose($archivo);

$numeros = explode(",", $contenido);
$suma = array_sum($numeros);
echo "La suma es: " . $suma;
