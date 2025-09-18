<?php 

/**
 * Ejercicio8
 *  Muestra todos los números pares entre 1 y 50.
 * @author  franciscorodalf
 */
 

 for ($i = 1; $i < 51; $i++) { 
    if ($i % 2 == 0) {
        echo("$i es un numero par\n");
    } else {
        echo("$i no es un numero par\n");
    }
 }
 