<?php

/**
 * Combina palabras de adjetivos.txt y animales.txt.
 */

// Escritura
$archivoAdjetivos = fopen("resources/adjetivos.txt", "w");
$adjetivos = [
    "rápido",
    "fuerte",
    "inteligente",
    "valiente",
    "ágil"
];
for ($i = 0; $i < count($adjetivos); $i++) {
    fwrite($archivoAdjetivos, $adjetivos[$i] . "\n");
}
fclose($archivoAdjetivos);

$archivoAnimales = fopen("resources/animales.txt", "w");
$animales = [
    "león",
    "tigre",
    "elefante",
    "águila",
    "delfín"
];
for ($i = 0; $i < count($animales); $i++) {
    fwrite($archivoAnimales, $animales[$i] . "\n");
}
fclose($archivoAnimales);

// Lectura
$archivoAdjetivos = fopen("resources/adjetivos.txt", "r");
$contenidoAdjetivos = fread($archivoAdjetivos, filesize("resources/adjetivos.txt"));
$lineasAdjetivos = explode("\n", trim($contenidoAdjetivos));
fclose($archivoAdjetivos);
$archivoAnimales = fopen("resources/animales.txt", "r");
$contenidoAnimales = fread($archivoAnimales, filesize("resources/animales.txt"));
$lineasAnimales = explode("\n", trim($contenidoAnimales));
fclose($archivoAnimales);


// Combinar y mostrar
$combinaciones = [];
for ($i = 0; $i < count($lineasAdjetivos); $i++) {
    for ($j = 0; $j < count($lineasAnimales); $j++) {
        $combinaciones[] = $lineasAdjetivos[$i] . " " . $lineasAnimales[$j];
    }
}
foreach ($combinaciones as $combinacion) {
    echo $combinacion . "\n";
}
