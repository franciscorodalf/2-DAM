<?php

/**
 * Ejercicio 12
 * Genera los primeros 20 términos de la secuencia de Fibonacci.
 */

 $numero1 = 0;
 $numero2 = 1;


 for ($i =0; $i < 20 ; $i++) { 
   $temporal = $numero1;
   $numero1 = $numero2;
   $numero2 = $temporal + $numero1;
   echo("$numero1\n");
 }