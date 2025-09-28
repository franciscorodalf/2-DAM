<?php

/**
 * Operaciones con números naturales en PHP
 * 
 */


$lineas = [];
/**
 * este if lo que hace es abrir y leer el fichero, se cierra si resulta que no se abre 
 * correctamente el archivo (importante saber que si no puede entrar en el archivo, aun
 * asi hay que cerrarlo)
 * 
 * el while lo que hace es obtener todos los datos del fichero y hasta que termine, todas 
 * las lineas se guardan en el array de lineas
 * 
 * 
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

    /**
     * este for each lo que hace es extraer todos los valores de las filas
     */
    foreach ($lineas as $fila) {

        /** este if se hace porque al leer el archivo da error si lee una linea vacia  */
        if (count($fila) < 3) {
            continue; // saltar filas incompletas o vacías
        }
        [$z1, $z2, $op] = $fila;

        $z1 = (float)$z1;
        $z2 = (float)$z2;
        $resultado = null;

        /**
         * se guarda el resultado en la variable y se verifica que operador es
         */

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
        /**
         * aqui se guardan los resultados del calculo para luego escribirlo en el csv
         */
        $resultados[] = [$z1, $z2, $op, $resultado];
    }
    return $resultados;
}


function escribirCSV(string $ruta, array $datos)
{

    /**
     * se escribe y se guarda los resultados
     */

    if (($fichero = fopen($ruta, "w")) !== false) {
        foreach ($datos as $fila) {
            fputcsv($fichero, $fila, ",", '"', "\\");
        }
        fclose($fichero);
    }
}


$lineas = leerCSV("resources/datos.csv");        // 1. Leo el fichero
$resultados = procesarOperaciones($lineas);     // 2. Calculo operaciones
escribirCSV("resources/resultado.csv", $resultados); // 3. Guardo resultados