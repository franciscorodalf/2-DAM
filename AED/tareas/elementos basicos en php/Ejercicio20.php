<?php

/**
 * Ejercicio 19
 * Muestra en pantalla un triángulo de altura n usando *.
 */

 function mostrarTriangulo($altura){
    for ($i=1; $i <= $altura ; $i++) { 
        for ($j=1; $j <= $i ; $j++) { 
            echo("*");
        }
        echo("\n");
    }
 }  