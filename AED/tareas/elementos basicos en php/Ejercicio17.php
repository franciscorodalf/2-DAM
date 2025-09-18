<?php

/**
 * Ejercicio 17
 * Escribe un algoritmo que invierta los dígitos de un número (ejemplo: 123 → 321).
 */

 function invertirNumeros($numeros){
    $invertido = 0;
    $original = $numeros;

    while ($numeros > 0) {
        $digito = $numeros % 10;
        $invertido = $invertido * 10 + $digito;
        $numeros = intdiv($numeros,10);

        echo("El numero original es $original\n");
        echo("El numero invertido es $invertido\n");
    }
   invertirNumeros(12345);
   invertirNumeros(56789);
 }