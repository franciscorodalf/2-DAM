<?php

/**
 * Reemplaza placeholders en plantilla.txt con palabras aleatorias de otros ficheros.
 */


// Escritura
$plantilla = "resources/plantilla.txt";
$archivoPlantilla = fopen($plantilla, "w");
fwrite($archivoPlantilla, "El [animal] saltó sobre la [cosa] y luego corrió hacia el [lugar].");
fclose($archivoPlantilla);

$animales = ["gato", "perro", "elefante", "tigre", "león"];
$cosas = ["árbol", "casa", "coche", "puente", "montaña"];
$lugares = ["parque", "playa", "ciudad", "bosque", "desierto"];
$archivoAnimales = fopen("resources/animales.txt", "w");
foreach ($animales as $animal) {
    fwrite($archivoAnimales, $animal . "\n");
}

$archivoCosas = fopen("resources/cosas.txt", "w");
foreach ($cosas as $cosa) {
    fwrite($archivoCosas, $cosa . "\n");
}
