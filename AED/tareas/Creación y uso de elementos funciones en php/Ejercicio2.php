<?php

/**
 * Ejercicio 2
 * Implementa una función montañaAsteriscos(int $n, $m): void que imprima una escalera de asteriscos de 
 * altura Ny el tamaño M.
 * @author franciscorodalf
 */


/**
 * Función que imprime una montaña de asteriscos.
 * @param int $n Altura de la montaña.
 * @param int $m Número de repeticiones por fila.
 */

function montañaAsteriscos(int $n, int $m): void{
    $lineas = [];

    for ($i = 1; $i <= $n; $i++) {
        if ($i == $n) {
            $espacios = 0;
        } else {
            $espacios = 2 * ($n - $i);
        }

        $fila = str_repeat("*", $i). str_repeat(" ", $espacios). str_repeat("*", $i);

        $lineas[] = $fila;
    }

    echo implode(PHP_EOL, $lineas) . PHP_EOL;
}

montañaAsteriscos(4, 2);
montañaAsteriscos(8, 10);
