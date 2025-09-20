<?php

/**
 * Ejercicio1
 * Implementa una funcion esCapicua(int $n): bool que  determine si un numero entero positivo es capicua.
 * @author franciscorodalf
 */

 function esCapicua(int $n): bool{
    $valorToString = strval($n);
    $invertirValor = strrev($valorToString);
    $valorRevertido = intval($invertirValor);
    if ($n == $valorRevertido) {
        echo("Es capicua\n");
        return true;
    } else {
        echo("no es capicua\n");
        return false;
    }
 }

 esCapicua(21112);
 esCapicua(12345);