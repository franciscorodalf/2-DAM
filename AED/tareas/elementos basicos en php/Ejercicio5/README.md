# Resultados de Ejercicio 5

El ejercicio 5 cuenta los números del **1 al 100** y los muestra en pantalla.

**Código**

```php
<?php

/**
 * Ejercicio 5
 * Contar los numeros del 1 al 100 en pantalla
 * @author franciscorodalf
 */

$numero = 1;

for ($numero; $numero < 101 ; $numero++) { 
    echo("Numero: $numero\n");
}
```

En este ejercicio se utiliza un **bucle `for`** que comienza en `1` y va incrementando de uno en uno hasta llegar a `100`.
Dentro del bucle se imprime cada número con `echo`.

---

## RESULTADOS DE CONSOLA

Inicio del bucle:

```console
Numero: 1
Numero: 2
Numero: 3
...
```

Final del bucle:

```console
...
Numero: 98
Numero: 99
Numero: 100
```

---
