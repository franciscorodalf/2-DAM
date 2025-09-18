# Resultados de Ejercicio 2

El ejercicio 2 pide al usuario su edad y muestra si es menor de edad o mayor de edad.

Código
```php
<?php

/**
 * Pide la edad de una persona y muestra si es menor o mayor de edad
 * @author franciscorodalf
 */

echo ("Inserte su edad\n");
$edad = (fgets(STDIN));

if ($edad <= 18) {
    echo ("Eres menor de edad");
} else {
    echo ("Eres mayor de edad");
}
```

Para pedir la edad al usuario he usado fgets, que lee lo que se escribe en la consola.

# RESULTADOS DE CONSOLA

Caso 1:
```console
Inserte su edad
15
Eres menor de edad
```

Caso 2:
```console
Inserte su edad
18
Eres menor de edad
```

Caso 3:
```console
Inserte su edad
20
Eres mayor de edad
```