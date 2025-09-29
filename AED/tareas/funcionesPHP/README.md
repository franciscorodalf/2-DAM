````markdown
# 📘 Ejercicios en PHP con CSV y Texto

## 🔹 Ejercicio 1: Operaciones con números naturales en CSV

```php
<?php

/**
 * Operaciones con números naturales en PHP
 */

function leerCSV(string $ruta): array
{
    if (($fichero = fopen($ruta, "r")) !== false) {
        while (($fila = fgetcsv($fichero, 0, ",", '"', "\\")) !== false) {
            $lineas[] = $fila;
        }
        fclose($fichero);
    }
    return $lineas;
}

function procesarOperaciones(array $lineas): array
{
    $resultados = [];
    $resultados[] = ["z1", "z2", "op", "resultado"];

    foreach ($lineas as $fila) {
        if (count($fila) < 3) {
            continue; // Saltar filas incompletas o vacías
        }
        [$z1, $z2, $op] = $fila;

        $z1 = (float)$z1;
        $z2 = (float)$z2;
        $resultado = null;

        switch ($op) {
            case 'sumar':
                $resultado = $z1 + $z2;
                break;
            case 'restar':
                $resultado = $z1 - $z2;
                break;
            case 'multiplicar':
                $resultado = $z1 * $z2;
                break;
            case 'dividir':
                if ($z2 != 0) {
                    $resultado = $z1 / $z2;
                } else {
                    $resultado = "Division por cero";
                }
                break;
            default:
                $resultado = "Operador no valido";
                break;
        }

        $resultados[] = [$z1, $z2, $op, $resultado];
    }
    return $resultados;
}

function escribirCSV(string $ruta, array $datos)
{
    if (($fichero = fopen($ruta, "w")) !== false) {
        foreach ($datos as $fila) {
            fputcsv($fichero, $fila, ",", '"', "\\");
        }
        fclose($fichero);
    }
}

// Programa principal
$lineas = leerCSV("resources/datos.csv");
$resultados = procesarOperaciones($lineas);
escribirCSV("resources/resultado.csv", $resultados);
````

---

## 🔹 Ejercicio 2: Contar palabras en un texto

```php
<?php

/**
 * Dado un fichero texto.txt, contar cuántas palabras hay en total 
 * y cuántas veces aparece cada palabra.
 * 
 * La salida se guarda en estadisticas.csv con el formato:
 * palabra,frecuencia
 * 
 * - Ignorar mayúsculas/minúsculas (PHP = php)
 * - Ignorar signos de puntuación
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
        fputcsv($fichero, ["palabra", "frecuencia"]); 
        foreach ($frecuencias as $palabra => $cantidad) {
            fputcsv($fichero, [$palabra, $cantidad]);
        }
        fclose($fichero);
    }
}

// Programa principal
$texto = leerTexto("resources/texto.txt");
$textoLimpio = limpiarTexto($texto);
$frecuencias = contarPalabras($textoLimpio);
escribirCSV("resources/estadisticas.csv", $frecuencias);
```

---

## 📌 Chuleta de funciones útiles en PHP

### 🔹 Strings (cadenas)

* `strtolower($txt)` → convierte a minúsculas.
* `strtoupper($txt)` → convierte a mayúsculas.
* `strrev($txt)` → invierte el texto.
* `strlen($txt)` → devuelve longitud.
* `substr($txt, inicio, len)` → extrae parte del string.
* `substr_count($txt, "a")` → cuenta ocurrencias de una subcadena.
* `strpos($txt, "palabra")` → devuelve posición de la primera ocurrencia.
* `str_replace("a","b",$txt)` → reemplaza texto (sensible a mayúsculas).
* `str_ireplace("a","b",$txt)` → reemplaza ignorando mayúsculas.
* `str_word_count($txt, 1)` → devuelve un array con las palabras.

### 🔹 Arrays

* `count($arr)` → número de elementos.
* `array_sum($arr)` → suma todos los valores.
* `array_reverse($arr)` → invierte el orden.
* `in_array("a",$arr)` → busca un valor.
* `array_count_values($arr)` → cuenta cuántas veces aparece cada valor.
* `sort($arr)` → ordena ascendente.
* `rsort($arr)` → ordena descendente.
* `usort($arr, $funcion)` → ordena con función personalizada.

### 🔹 Ficheros

* `file_get_contents($ruta)` → lee todo el archivo en un string.
* `file_put_contents($ruta, $txt)` → escribe en un archivo.
* `file($ruta)` → lee el archivo en un array, cada línea es un elemento.
* `fopen($ruta, "r"|"w")` → abre fichero en lectura/escritura.
* `fclose($f)` → cierra fichero.
* `fgetcsv($f, 0, ",", '"', "\\")` → lee una fila CSV como array.
* `fputcsv($f, $arr, ",", '"', "\\")` → escribe un array en CSV.

### 🔹 Validación

* `ctype_alpha($txt)` → ¿solo letras?
* `ctype_digit($txt)` → ¿solo dígitos?
* `is_numeric($valor)` → ¿es número?
* `filter_var($email, FILTER_VALIDATE_EMAIL)` → valida email.