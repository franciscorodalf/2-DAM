<?php

/**
 * Ejercicio 6
 * Calcula la suma de los numeros del 1 al 50 usando bucle
 * @author franciscorodalf
 */

 $suma = 0;

for ($i = 1; $i < 51 ; $i++) { 
    $suma = $suma + $i;
    echo("Suma: $suma\n");
}
