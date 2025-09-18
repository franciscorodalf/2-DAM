<?php

/**
 * Ejercicio11
 * Escribe un algoritmo que muestre los números primos entre 1 y 50.
 */

 function numerosPrimos(){
    for ($i = 1; $i < 51 ; $i++) { 
        $esPrimo = true;
        for ($j = 2; $j < $i ; $j++) { 
            if ($i % $j == 0) {
                $esPrimo = false;
            }
        }
        if ($esPrimo) {
            echo("$i es un numero primo\n");
        } else {
            echo("$i no es un numero primo\n");
        }
    }
 }