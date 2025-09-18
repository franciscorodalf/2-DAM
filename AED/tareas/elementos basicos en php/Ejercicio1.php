<?php
/**
 * Ejercicio 1: Mayor de dos numeros
 * Pide dos numeros y muestra cual es mayor y si son iguales
 * @author franciscorodalf
 */

 /**
  * Funcion que le pide al usuario dos digitos y muestra cual es mayor 
  * o si son iguales
  */
 echo("Inserte el primer digito\n");
 $num1 = (fgets(STDIN));
 echo("Inserte el segundo digito\n");
 $num2 = (fgets(STDIN));

 if ($num1 > $num2) {
    echo("el numero mayor es el $num1");
 }  elseif ($num2 > $num1) {
    echo("el numero mayor es $num2");
 } else {
    echo("los numeros son iguales");
 }

?>