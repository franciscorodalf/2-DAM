<?php

/**
 * Ejercicio15
 * Genera un número aleatorio entre 1 y 20.
 * Pide al usuario que lo adivine y usa un bucle con condicionales para dar pistas: "Mayor" o "Menor".
 */

 $numeroAleatorio = rand(1,20);
 $isAdivinado= false;

 echo("Di un numero entre el 1 al 20\n");
 while (!$isAdivinado) {
    $respuesta = (int) trim(fgets(STDIN));

    if ($respuesta == $numeroAleatorio) {
        echo("Has adivinado el numero! el numero es $numeroAleatorio");
        $isAdivinado = true;
    } elseif ($respuesta < $numeroAleatorio) {
        echo("El numero secreto es mayor\n");
    } else {
        echo("El numero secreto es menor\n");
    }
 }