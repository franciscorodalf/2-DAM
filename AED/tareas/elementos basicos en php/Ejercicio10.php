<?php

/**
 * Ejercicio10
 *  Calcula el factorial de un número introducido (ejemplo: 5! = 120).
 * @author  franciscorodalf 
 *  */ 

 function factorial($numero){
    $numeroFactorial = 1;
    for ($i = 1 ; $i <= $numero  ; $i++ ) { 
        $numeroFactorial *= $i;
      echo("$numero! = $numeroFactorial\n");     
    }
 }

 factorial(5);