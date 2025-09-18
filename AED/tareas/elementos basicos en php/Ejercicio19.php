<?php

/**
 * Ejercicio 19
 * Escribe un algoritmo que calcule el MCD de dos números.
 * @author franciscorodalf
 */

 function calculadorMCD($num1, $num2){
    while ($num2 != 0) {
        $temp = $num2;
        $num2 = $num1 % $num2;
        $num1 = $temp;
    }
    return $num1;
 }