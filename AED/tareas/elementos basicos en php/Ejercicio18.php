<?php

/**
 * Ejercicio 18
 * Comprueba si una palabra almacenada en una variable es palíndroma.
 * @author franciscorodalf
 */

$palabra = "anitalavalatina";
$palabraInvertida = strrev($palabra);

if ($palabra == $palabraInvertida) {
 echo("La palabra $palabra es palindroma\n");
} else {
 echo("La palabra $palabra no es palindroma\n");
}
