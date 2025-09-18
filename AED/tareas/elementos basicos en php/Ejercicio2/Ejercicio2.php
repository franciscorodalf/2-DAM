<?php

/**
 * Pide la edad de una persona y muestra si es menor o mayor de edad
 * @author franciscorodalf
 */

echo ("Inserte su edad\n");
$edad = (int) (fgets(STDIN));

if ($edad <= 18) {
    echo ("Eres menor de edad");
} else {
    echo ("Eres mayor de edad");
}

