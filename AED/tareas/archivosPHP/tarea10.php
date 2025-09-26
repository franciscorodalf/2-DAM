<?php

/**
 * Crea datos.json con información de personas (nombre y edad). Haz que el programa lo lea y muestre los datos.
 * Funciones sugeridas: file_get_contents, json_decode
 */

// Escritura
$personas = [
    ["nombre" => "Ana", "edad" => 28],
    ["nombre" => "Luis", "edad" => 34],
    ["nombre" => "María", "edad" => 22],
    ["nombre" => "Jorge", "edad" => 45]
];
$archivo = fopen("resources/datos.json", "w");
fwrite($archivo, json_encode($personas));
fclose($archivo);

// Lectura
$archivo = fopen("resources/datos.json", "r");
$contenido = fread($archivo, filesize("resources/datos.json"));
echo($contenido);
fclose($archivo);
