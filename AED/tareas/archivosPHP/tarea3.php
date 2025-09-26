<?php

/**
 * Escribe un texto en texto.txt, luego haz que tu programa cuente cuántas palabras contiene ese archivo.
 * Funciones sugeridas: file_get_contents, str_word_count
 */

 //Escritura

 $archivo = fopen("resources/texto.txt","w");
fwrite($archivo, "PHP es muy divertido y potente");
fclose($archivo);


$archivo = fopen("resources/texto.txt","r");
$texto = fread($archivo, filesize("resources/texto.txt"));
echo str_word_count($texto);
fclose($archivo);
 