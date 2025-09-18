<?php

/**
 * Ejercicio 7
 * Pide un numero y genera su tabla de multiplicar del 1 al 10
 * @author franciscorodalf
 */

 $multiplicador = 0;

 echo("Inserte un numero\n");
 $numero = (int) trim(fgets(STDIN));

 for ($multiplicador; $multiplicador < 11 ; $multiplicador++) { 
    $calculo = $numero * $multiplicador;
    echo("$numero x $multiplicador = $calculo\n");
 }