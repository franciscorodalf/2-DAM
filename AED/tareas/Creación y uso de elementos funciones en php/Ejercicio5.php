<?php

/**
 * Ejercicio 5
 * Implementa una función secuenciaCollatz(int $n): array que genere la secuencia de Collatz
 *  a partir de un entero positivo.
 * Si el número es par → dividir entre 2.
 * Si es impar → multiplicar por 3 y sumar 1.
 * Repetir hasta llegar a 1.
 * @author franciscorodalf
 */


function  secuenciaCollatz(int $n): array{
    $lista = [];
    while ($n != 1) {
        $lista[] = $n;
        if ($n % 2 == 0) {
            $n = $n / 2;
        } else {
            $n = 3 * $n + 1;
        }
    }
return $lista;
}

print_r(secuenciaCollatz(6));
print_r(secuenciaCollatz(19));
print_r(secuenciaCollatz(27));