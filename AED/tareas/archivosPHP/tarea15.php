<?php

/**
 * Muestra un chiste distinto en cada ejecución desde chistes.txt.
 */

// Escritura
$archivo = fopen("resources/chistes.txt", "w");
$chistes = [
    "¿Por qué los pájaros no usan Facebook? Porque ya tienen Twitter.",
    "¿Qué le dice una iguana a su hermana gemela? Somos iguanas.",
    "¿Cuál es el colmo de un jardinero? Que siempre lo dejen plantado.",
    "¿Por qué los esqueletos no pelean entre ellos? Porque no tienen agallas."
];
for ($i=0; $i < count($chistes) ; $i++) {
    fwrite($archivo, $chistes[$i] . "\n");
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/chistes.txt", "r");
$contenido = fread($archivo, filesize("resources/chistes.txt"));
$chistesArray = explode("\n", trim($contenido));
$chisteAleatorio = $chistesArray[array_rand($chistesArray)];
fclose($archivo);

// Mostrar chiste al azar
echo "Chiste del día: " . $chisteAleatorio . "\n";

