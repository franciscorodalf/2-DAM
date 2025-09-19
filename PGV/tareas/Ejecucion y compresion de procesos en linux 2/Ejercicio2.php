<?php

/**
 * Ejercicio 2
 * Implementa una función montañaAsteriscos(int $n, $m): void que imprima una escalera de asteriscos de 
 * altura Ny el tamaño M.
 * @author franciscorodalf
 */

 /**
  *   La primera fila contiene 1 asterisco, la segunda 2, y así hasta N, M veces.
  * Ejemplo con entrada 4,2:
    *.     *
    **.   **
    ***  ***
    ********

  */
  function montañaAsteriscos($n, $m){
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $m; $j++) {
            // Asteriscos
            for ($k = 1; $k <= $i; $k++) {
                echo("*");
            }
            // Espacios de relleno (hasta n, excepto al final del último bloque)
            if ($j < $m) {
                for ($s = 1; $s <= $n - $i; $s++) {
                    echo(" ");
                }
            }
        }
        echo("\n");
    }
}


montañaAsteriscos(4, 2);
montañaAsteriscos(10, 5);