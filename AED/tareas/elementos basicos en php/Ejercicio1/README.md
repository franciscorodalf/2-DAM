# Resultados de Ejercicio 1

El ejercicio 1 hace una funcion que le pide al usuario insertar dos digitos y indica cual es mayor o menor y si son iguales

**Codigo**
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

Para pedirle al usuario un digito o informacion, he usado ``fgets``, que capta todo lo escrito por el usuario en la consola. 

si hacemos esto: 

```php
 $num1 = trim(fgets(STDIN));
```

elimina todos los espacios en blanco


## RESULTADOS DE CONSOLA

Caso numero 1:
```console
Inserte el primer digito
2
Inserte el segundo digito
3
el numero mayor es 3
```
Caso 2:

```console
Inserte el primer digito
3
Inserte el segundo digito
2
el numero mayor es el 3
```

Caso 3:

```console
Inserte el primer digito
1
Inserte el segundo digito
1
los numeros son iguales
```