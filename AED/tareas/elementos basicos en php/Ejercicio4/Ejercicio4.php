<?php

/**
 * Pide la nota de un alumno y muestra si esta aprobado, suspenso, notable o sobresaliente
 * @author franciscorodalf
 */

echo ("Inserte la nota del alumno\n");
$notaAlumno = (int) trim(fgets(STDIN));

if ($notaAlumno < 5) {
    echo ("El alumno está suspenso");
} elseif ($notaAlumno < 7) {
    echo ("El alumno está aprobado");
} elseif ($notaAlumno < 9) {
    echo ("El alumno tiene un notable");
} else {
    echo ("El alumno tiene un sobresaliente");
}
