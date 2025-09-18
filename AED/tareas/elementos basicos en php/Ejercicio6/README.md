# Resultados de Ejercicio 6

El ejercicio 6 calcula la **suma de los números del 1 al 50** usando un bucle.

**Código**

```php
<?php

/**
 * Ejercicio 6
 * Calcula la suma de los numeros del 1 al 50 usando bucle
 * @author franciscorodalf
 */

$suma = 0;

for ($i = 1; $i < 51 ; $i++) { 
    $suma = $suma + $i;
    echo("Suma: $suma\n");
}
```

En este ejercicio se declara la variable `$suma` inicializada en 0.
Luego, mediante un **bucle `for`**, se va sumando cada número desde 1 hasta 50.
En cada iteración se muestra el valor acumulado de la suma.

---

## RESULTADOS DE CONSOLA

Inicio del bucle:

```console
Suma: 1
Suma: 3
Suma: 6
Suma: 10
```

Al final del bucle:

```console
...
Suma: 1225
Suma: 1275
Suma: 1326
```

Resultado final:

```console
Suma: 1275
```
