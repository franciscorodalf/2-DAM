<?php

/**
 * Ejercicio 4
 * Implementa una función multiplosTresOCinco(int $n): array que devuelva todos los múltiplos de 3 o 5 menores que N.
 * Además, calcula la suma de dichos múltiplos.
 * @author franciscorodalf
 */
function multiplosTresOCinco(int $n): array
{
    $multiplos = [];

    for ($i = 1; $i < $n; $i++) {
        if ($i % 3 == 0 || $i % 5 == 0) {
            $multiplos[] = $i;
        }
    }

    $suma = array_sum($multiplos);
    echo "La suma de los múltiplos de 3 o 5 menores que $n es: $suma\n";

    return $multiplos;
}

print_r(multiplosTresOCinco(10));