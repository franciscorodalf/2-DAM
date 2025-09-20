# Ejercicios de PHP: Creación y uso de funciones

## Ejercicio 1
**Código:**
```php
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
```

**Resultado en consola:**
```
Es capicua
no es capicua
```

## Ejercicio 2
**Código:**
```php

function montañaAsteriscos(int $n, int $m): void{
    $lineas = [];

    for ($i = 1; $i <= $n; $i++) {
        if ($i == $n) {
            $espacios = 0;
        } else {
            $espacios = 2 * ($n - $i);
        }

        $fila = str_repeat("*", $i). str_repeat(" ", $espacios). str_repeat("*", $i);

        $lineas[] = $fila;
    }

    echo implode(PHP_EOL, $lineas) . PHP_EOL;
}

montañaAsteriscos(4, 2);
montañaAsteriscos(8, 10);

```

**Resultado en consola:**
```
*      *
**    **
***  ***
********
*              *
**            **
***          ***
****        ****
*****      *****
******    ******
*******  *******
****************
```

## Ejercicio 3
**Código:**
```php
 function sumaDigitos(int $n): int{
        $suma = 0;
        while ($n > 0) {
            $suma += $n % 10; 
            $n = intdiv($n, 10); 
        }
        return $suma;
    }

    echo(sumaDigitos(12345) . "\n"); 
    echo(sumaDigitos(987654321) . "\n"); 
    echo(sumaDigitos(01) . "\n"); 
```

**Resultado en consola:**
```
15
45
1
```

## Ejercicio 4
**Código:**
```php
function multiplosTresOCinco(int $n): array
{
    $multiplos = [];

    for ($i = 1; $i < $n; $i++) {
        if ($i % 3 == 0 || $i % 5 == 0) {
            $multiplos[] = $i;
        }
    }

    $suma = array_sum($multiplos);
    echo "La suma de los múltiplos de 3 o 5 menores que $n es: $suma\n";

    return $multiplos;
}

print_r(multiplosTresOCinco(10));
```

**Resultado en consola:**
```
La suma de los múltiplos de 3 o 5 menores que 10 es: 23
Array
(
    [0] => 3
    [1] => 5
    [2] => 6
    [3] => 9
)
```

## Ejercicio 5
**Código:**
```php

function  secuenciaCollatz(int $n): array{
    $lista = [];
    while ($n != 1) {
        $lista[] = $n;
        if ($n % 2 == 0) {
            $n = $n / 2;
        } else {
            $n = 3 * $n + 1;
        }
    }
return $lista;
}

print_r(secuenciaCollatz(6));
```

**Resultado en consola:**
```
Array
(
    [0] => 6
    [1] => 3
    [2] => 10
    [3] => 5
    [4] => 16
    [5] => 8
    [6] => 4
    [7] => 2
)
```