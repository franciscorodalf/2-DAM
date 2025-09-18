<?php

/**
 * Ejercicio 13
 * Pide un número n y muestra sus múltiplos hasta 100.
 */


  function mostratMultiplos($numero){
   $multiplicador = 0;
    for ($multiplicador; $multiplicador < 101 ; $multiplicador++) { 
       $calculo = $numero * $multiplicador;
       echo("$numero x $multiplicador = $calculo\n");
    }
 }

       mostratMultiplos(3);