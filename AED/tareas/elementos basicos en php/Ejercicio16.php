<?php

/**
 * Ejercicio 16
 * Comprueba si un número es perfecto (la suma de sus divisores propios es igual al número).
 */

function numeroPerfecto($numero){
     $sumaDivisores = 0;
    for ($i=1; $i < $numero ; $i++) { 
        if ($numero % $i == 0) {
            $sumaDivisores += $i;
        }
    }

    if ($sumaDivisores == $numero) {
        echo("$numero es un numero perfecto\n");
    } else {
        echo("$numero no es un numero perfecto\n");
    }
 }


 numeroPerfecto(2);
 numeroPerfecto(16);
 numeroPerfecto(28);
 numeroPerfecto(12);