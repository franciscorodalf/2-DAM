# Resultados de Ejercicio 7

El ejercicio 7 pide al usuario un número y genera su **tabla de multiplicar del 1 al 10**.

**Código**

```php
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
```

En este ejercicio se usa `fgets(STDIN)` para leer el número ingresado por el usuario.
Con un bucle `for` se multiplica ese número por todos los valores entre 0 y 10, mostrando el resultado en cada iteración.

---

## RESULTADOS DE CONSOLA

Caso con el número 5:

```console
Inserte un numero
5
5 x 0 = 0
5 x 1 = 5
5 x 2 = 10
5 x 3 = 15
5 x 4 = 20
5 x 5 = 25
5 x 6 = 30
5 x 7 = 35
5 x 8 = 40
5 x 9 = 45
5 x 10 = 50
```
