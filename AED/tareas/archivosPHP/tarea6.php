<?php

/**
 *  Lee frase.txt, invierte el texto y guarda el resultado en frase_invertida.txt.
 */

// Escritura
$archivo = fopen("resources/frase.txt", "w");
$frase = fwrite($archivo, "Hola mundo desde PHP");
fclose($archivo);

// Escritura frase invertida
$archivo = fopen("resources/frase_invertida.txt", "w");
$frase = file_get_contents("resources/frase.txt");
$fraseInvertida = strrev($frase);
fwrite($archivo, $fraseInvertida);
fclose($archivo);


// Lectura
$archivoInvertido = fopen("resources/frase_invertida.txt", "r");
$archivo = fopen("resources/frase.txt", "r");
$contenido = fread($archivo, filesize("resources/frase.txt"));
$contenidoFraseInvertida= fread($archivoInvertido, filesize("resources/frase_invertida.txt"));
echo($contenido . "\n");
echo($contenidoFraseInvertida);
