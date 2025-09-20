<?php

/**
 * Ejercicio 3
 * Implementa una función sumaDigitos(int $n): int que calcule la suma de los dígitos de un número entero positivo.
 * @author franciscorodalf
 */

    function sumaDigitos(int $n): int{
        $suma = 0;
        while ($n > 0) {
            $suma += $n % 10; 
            $n = intdiv($n, 10); 
        }
        return $suma;
    }

    echo(sumaDigitos(12345) . "\n"); 
    echo(sumaDigitos(987654321) . "\n"); 
    echo(sumaDigitos(01) . "\n"); 