# Resultados de Ejercicio 3

El ejercicio 3 guarda un número en una variable y comprueba si es **positivo**, **negativo** o **cero**.

**Código**

```php
<?php

/**
 * Ejercicio 3
 * Comprueba si un numero almacenado en una variable es negativo, positivo o cero
 * @author franciscorodalf
 */
$numero = 4;

if ($numero > 0) {
    echo ("El numero es positivo");
} elseif ($numero < 0) {
    echo ("El numero es negativo");
} else {
    echo ("El numero es cero");
}

?>
```

En este caso, no se pide nada al usuario. El valor ya está guardado en la variable `$numero`.
Después, mediante condiciones `if`, `elseif` y `else`, se determina el resultado según si el número es mayor, menor o igual a 0.

---

## RESULTADOS DE CONSOLA

Caso 1:

```console
$numero = 4
El numero es positivo
```

Caso 2:

```console
$numero = -2
El numero es negativo
```

Caso 3:

```console
$numero = 0
El numero es cero
```
