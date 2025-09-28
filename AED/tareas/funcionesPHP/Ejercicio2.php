<?php

/**
 * Dado un fichero texto.txt, contar cuántas palabras hay en total y cuántas veces aparece cada palabra.
 * La salida se debe guardar en estadisticas.csv con el formato:
 * palabra,frecuencia
 * 
 * Ignorar mayúsculas/minúsculas (ejemplo: PHP y php cuentan como la misma palabra).
 * Ignorar signos de puntuación.
 */


 function leerTexto(string $ruta){
    return file_get_contents($ruta);
}


function limpiarTexto(string $texto): string {
    $texto = strtolower($texto);
    $signos = [".", ",", ";", ":", "!", "?", "¿", "¡", "(", ")", "\""];
    $texto = str_replace($signos, " ", $texto); 
    return $texto;
}

function contarPalabras(string $texto): array {
    $texto = strtolower($texto);
    $palabras = str_word_count($texto, 1); 
    return array_count_values($palabras);
}

function escribirCSV(string $ruta, array $frecuencias): void {
    if (($fichero = fopen($ruta, "w")) !== false) {
        fputcsv($fichero, ["palabra", "frecuencia"]); // cabecera
        foreach ($frecuencias as $palabra => $cantidad) {
            fputcsv($fichero, [$palabra, $cantidad]);
        }
        fclose($fichero);
    }
}

$texto = leerTexto("resources/texto.csv");
$textoLimpio = limpiarTexto($texto);
$frecuencias = contarPalabras($textoLimpio);
escribirCSV("resources/estadisticas.csv", $frecuencias);
