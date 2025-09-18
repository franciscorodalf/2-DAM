
# Resultados de Ejercicio 4

El ejercicio 4 pide al usuario la nota de un alumno y muestra si está **suspenso**, **aprobado**, **notable** o **sobresaliente**.

**Código**

```php
<?php
/**
 * Pide la nota de un alumno y muestra si está aprobado, suspenso, notable o sobresaliente
 * @author franciscorod
 */

echo("Inserte la nota del alumno\n");
$notaAlumno = (int) trim(fgets(STDIN));

if ($notaAlumno < 5) {
    echo("El alumno está suspenso");
} elseif ($notaAlumno < 7) {
    echo("El alumno está aprobado");
} elseif ($notaAlumno < 9) {
    echo("El alumno tiene un notable");
} else {
    echo("El alumno tiene un sobresaliente");
}
```

Para pedir la nota se usa `fgets(STDIN)`, que lee lo que el usuario escribe en la consola.
El `trim()` elimina espacios o saltos de línea, y con `(int)` se convierte el valor en número entero.

---

## RESULTADOS DE CONSOLA

Caso 1:

```console
Inserte la nota del alumno
3
El alumno está suspenso
```

Caso 2:

```console
Inserte la nota del alumno
6
El alumno está aprobado
```

Caso 3:

```console
Inserte la nota del alumno
8
El alumno tiene un notable
```

Caso 4:

```console
Inserte la nota del alumno
9
El alumno tiene un sobresaliente
```

---