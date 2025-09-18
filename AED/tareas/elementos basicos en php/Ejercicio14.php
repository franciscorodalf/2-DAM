<?php
 
/**
 * Ejercicio 14
 * Calcula la suma de los números pares e impares entre 1 y 100 por separado.
 */

 $numerosPares = 0;
 $numerosImpares = 0;
 for ($i = 1; $i < 101; $i++) { 
    if ($i % 2 == 0) {
        $numerosPares++;
    } else {
       $numerosImpares++;
    }
 }
 echo("Total de numeros pares: $numerosPares\n");
 echo("Total de numeros impares: $numerosImpares\n");