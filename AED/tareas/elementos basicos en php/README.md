# Ejercicios Básicos en PHP

Este directorio contiene ejercicios básicos de PHP para aprender los fundamentos del lenguaje.

## Ejercicio 1: Mayor de dos números

**Descripción:** Pide dos números y muestra cuál es mayor o si son iguales.

**Código:**
```php
echo("Inserte el primer digito\n");
$num1 = (fgets(STDIN));
echo("Inserte el segundo digito\n");
$num2 = (fgets(STDIN));

if ($num1 > $num2) {
   echo("el numero mayor es el $num1");
}  elseif ($num2 > $num1) {
   echo("el numero mayor es $num2");
} else {
   echo("los numeros son iguales");
}
```

**Resultados:**

Caso 1:
```
Inserte el primer digito
2
Inserte el segundo digito
3
el numero mayor es 3
```

Caso 2:
```
Inserte el primer digito
3
Inserte el segundo digito
2
el numero mayor es el 3
```

Caso 3:
```
Inserte el primer digito
1
Inserte el segundo digito
1
los numeros son iguales
```

## Ejercicio 2: Mayor o menor de edad

**Descripción:** Pide la edad de una persona y muestra si es menor o mayor de edad.

**Código:**
```php
echo ("Inserte su edad\n");
$edad = (fgets(STDIN));

if ($edad <= 18) {
    echo ("Eres menor de edad");
} else {
    echo ("Eres mayor de edad");
}
```

**Resultados:**

Caso 1:
```
Inserte su edad
15
Eres menor de edad
```

Caso 2:
```
Inserte su edad
18
Eres menor de edad
```

Caso 3:
```
Inserte su edad
20
Eres mayor de edad
```

## Ejercicio 3: Número positivo, negativo o cero

**Descripción:** Comprueba si un número almacenado en una variable es negativo, positivo o cero.

**Código:**
```php
$numero = 4;

if ($numero > 0) {
    echo ("El numero es positivo");
} elseif ($numero < 0) {
    echo ("El numero es negativo");
} else {
    echo ("El numero es cero");
}
```

**Resultados:**

Caso 1:
```
$numero = 4
El numero es positivo
```

Caso 2:
```
$numero = -2
El numero es negativo
```

Caso 3:
```
$numero = 0
El numero es cero
```

## Ejercicio 4: Calificación de un alumno

**Descripción:** Pide la nota de un alumno y muestra si está aprobado, suspenso, notable o sobresaliente.

**Código:**
```php
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

**Resultados:**

Caso 1:
```
Inserte la nota del alumno
3
El alumno está suspenso
```

Caso 2:
```
Inserte la nota del alumno
6
El alumno está aprobado
```

Caso 3:
```
Inserte la nota del alumno
8
El alumno tiene un notable
```

Caso 4:
```
Inserte la nota del alumno
9
El alumno tiene un sobresaliente
```

## Ejercicio 5: Contar del 1 al 100

**Descripción:** Muestra en pantalla los números del 1 al 100.

**Código:**
```php
$numero = 1;
 
for ($numero; $numero < 101 ; $numero++) { 
    echo("Numero: $numero\n");
}
```

**Resultados:**
```
Numero: 1
Numero: 2
Numero: 3
...
Numero: 98
Numero: 99
Numero: 100
```

## Ejercicio 6: Suma de números del 1 al 50

**Descripción:** Calcula la suma de los números del 1 al 50 usando bucle.

**Código:**
```php
$suma = 0;

for ($i = 1; $i < 51 ; $i++) { 
    $suma = $suma + $i;
    echo("Suma: $suma\n");
}
```

**Resultados:**
```
Suma: 1
Suma: 3
Suma: 6
Suma: 10
...
Suma: 1225
Suma: 1275
```

## Ejercicio 7: Tabla de multiplicar

**Descripción:** Pide un número y genera su tabla de multiplicar del 1 al 10.

**Código:**
```php
$multiplicador = 0;

echo("Inserte un numero\n");
$numero = (int) trim(fgets(STDIN));

for ($multiplicador; $multiplicador < 11 ; $multiplicador++) { 
    $calculo = $numero * $multiplicador;
    echo("$numero x $multiplicador = $calculo\n");
}
```

**Resultados:**
```
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

## Ejercicio 8: Números pares entre 1 y 50

**Descripción:** Muestra todos los números pares entre 1 y 50.

**Código:**
```php
for ($i = 1; $i < 51; $i++) { 
    if ($i % 2 == 0) {
        echo("$i es un numero par\n");
    } else {
        echo("$i no es un numero par\n");
    }
}
```

**Resultados:**
```
1 no es un numero par
2 es un numero par
3 no es un numero par
4 es un numero par
...
49 no es un numero par
50 es un numero par
```

## Ejercicio 9: Conteo descendente

**Descripción:** Muestra un bucle que cuente de 10 a 1 y luego muestre "¡Fin!".

**Código:**
```php
for ($i = 10; $i > 0 ; $i--) { 
    echo("$i\n");
}
echo("¡Fin!");
```

**Resultados:**
```
10
9
8
7
6
5
4
3
2
1
¡Fin!
```

## Ejercicio 10: Factorial de un número

**Descripción:** Calcula el factorial de un número introducido.

**Código:**
```php
function factorial($numero){
    $numeroFactorial = 1;
    for ($i = 1 ; $i <= $numero  ; $i++ ) { 
        $numeroFactorial *= $i;
      echo("$numero! = $numeroFactorial\n");     
    }
}

factorial(5);
```

**Resultados:**
```
5! = 1
5! = 2
5! = 6
5! = 24
5! = 120
```

## Ejercicio 11: Números primos entre 1 y 50

**Descripción:** Muestra los números primos entre 1 y 50.

**Código:**
```php
function numerosPrimos(){
    for ($i = 1; $i < 51 ; $i++) { 
        $esPrimo = true;
        for ($j = 2; $j < $i ; $j++) { 
            if ($i % $j == 0) {
                $esPrimo = false;
            }
        }
        if ($esPrimo) {
            echo("$i es un numero primo\n");
        } else {
            echo("$i no es un numero primo\n");
        }
    }
}
```

**Resultados:**
```
1 es un numero primo
2 es un numero primo
3 es un numero primo
4 no es un numero primo
5 es un numero primo
...
47 es un numero primo
48 no es un numero primo
49 no es un numero primo
50 no es un numero primo
```

## Ejercicio 12: Secuencia de Fibonacci

**Descripción:** Genera los primeros 20 términos de la secuencia de Fibonacci.

**Código:**
```php
$numero1 = 0;
$numero2 = 1;

for ($i =0; $i < 20 ; $i++) { 
  $temporal = $numero1;
  $numero1 = $numero2;
  $numero2 = $temporal + $numero1;
  echo("$numero1\n");
}
```

**Resultados:**
```
1
1
2
3
5
8
13
21
34
55
89
144
233
377
610
987
1597
2584
4181
6765
```

## Ejercicio 13: Múltiplos hasta 100

**Descripción:** Pide un número n y muestra sus múltiplos hasta 100.

**Código:**
```php
function mostratMultiplos($numero){
  $multiplicador = 0;
   for ($multiplicador; $multiplicador < 101 ; $multiplicador++) { 
      $calculo = $numero * $multiplicador;
      echo("$numero x $multiplicador = $calculo\n");
   }
}

mostratMultiplos(3);
```

**Resultados:**
```
3 x 0 = 0
3 x 1 = 3
3 x 2 = 6
...
3 x 99 = 297
3 x 100 = 300
```

## Ejercicio 14: Suma de pares e impares

**Descripción:** Calcula la suma de los números pares e impares entre 1 y 100 por separado.

**Código:**
```php
$numerosPares = 0;
$numerosImpares = 0;
for ($i = 1; $i < 101; $i++) { 
   if ($i % 2 == 0) {
       $numerosPares++;
   } else {
      $numerosImpares++;
   }
}
echo("Total de numeros pares: $numerosPares\n");
echo("Total de numeros impares: $numerosImpares\n");
```

**Resultados:**
```
Total de numeros pares: 50
Total de numeros impares: 50
```

## Ejercicio 15: Adivina el número

**Descripción:** Genera un número aleatorio entre 1 y 20. Pide al usuario que lo adivine y da pistas.

**Código:**
```php
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
```

**Resultados:**
```
Di un numero entre el 1 al 20
10
El numero secreto es mayor
15
El numero secreto es menor
12
Has adivinado el numero! el numero es 12
```

## Ejercicio 16: Número perfecto

**Descripción:** Comprueba si un número es perfecto (la suma de sus divisores propios es igual al número).

**Código:**
```php
function numeroPerfecto($numero){
    $sumaDivisores = 0;
   for ($i=1; $i < $numero ; $i++) { 
       if ($numero % $i == 0) {
           $sumaDivisores += $i;
       }
   }

   if ($sumaDivisores == $numero) {
       echo("$numero es un numero perfecto\n");
   } else {
       echo("$numero no es un numero perfecto\n");
   }
}


numeroPerfecto(2);
numeroPerfecto(16);
numeroPerfecto(28);
numeroPerfecto(12);
```

**Resultados:**
```
2 no es un numero perfecto
16 no es un numero perfecto
28 es un numero perfecto
12 no es un numero perfecto
```

## Ejercicio 17: Inversión de dígitos

**Descripción:** Escribe un algoritmo que invierta los dígitos de un número.

**Código:**
```php
function invertirNumeros($numeros){
   $invertido = 0;
   $original = $numeros;

   while ($numeros > 0) {
       $digito = $numeros % 10;
       $invertido = $invertido * 10 + $digito;
       $numeros = intdiv($numeros,10);

       echo("El numero original es $original\n");
       echo("El numero invertido es $invertido\n");
   }
}

invertirNumeros(12345);
invertirNumeros(56789);
```

**Resultados:**
```
El numero original es 12345
El numero invertido es 5
El numero original es 12345
El numero invertido es 54
El numero original es 12345
El numero invertido es 543
El numero original es 12345
El numero invertido es 5432
El numero original es 12345
El numero invertido es 54321

El numero original es 56789
El numero invertido es 9
El numero original es 56789
El numero invertido es 98
...
```

## Ejercicio 18: Palíndromo

**Descripción:** Comprueba si una palabra almacenada en una variable es palíndroma.

**Código:**
```php
$palabra = "anitalavalatina";
$palabraInvertida = strrev($palabra);

if ($palabra == $palabraInvertida) {
 echo("La palabra $palabra es palindroma\n");
} else {
 echo("La palabra $palabra no es palindroma\n");
}
```

**Resultados:**
```
La palabra anitalavalatina es palindroma
```

## Ejercicio 19: Máximo Común Divisor (MCD)

**Descripción:** Escribe un algoritmo que calcule el MCD de dos números.

**Código:**
```php
function calculadorMCD($num1, $num2){
   while ($num2 != 0) {
       $temp = $num2;
       $num2 = $num1 % $num2;
       $num1 = $temp;
   }
   return $num1;
}
```

## Ejercicio 20: Triángulo de asteriscos

**Descripción:** Muestra en pantalla un triángulo de altura n usando asteriscos.

**Código:**
```php
function mostrarTriangulo($altura){
   for ($i=1; $i <= $altura ; $i++) { 
       for ($j=1; $j <= $i ; $j++) { 
           echo("*");
       }
       echo("\n");
   }
}
```

**Resultados:**
```
*
**
***
****
*****
```