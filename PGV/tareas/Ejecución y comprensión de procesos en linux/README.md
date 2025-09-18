## Instrucciones de la práctica  

En esta práctica se trabajará en **dos fases complementarias**:

1. **Parte teórica:** Responde a los conceptos solicitados mediante la **búsqueda de información confiable**, citando siempre las **fuentes consultadas** al final de cada respuesta.  
2. **Parte práctica:** Ejecuta en Linux los **comandos indicados** y muestra la **salida obtenida** junto con una breve explicación de su significado.  

El objetivo es afianzar la comprensión de los **procesos en sistemas operativos**, tanto desde el punto de vista conceptual como práctico.  


## Bloque 1: Conceptos básicos (teoría)

### Ejercicio 0 (ejemplo resuelto)  

**Pregunta:** Explica la diferencia entre hardware, sistema operativo y aplicación.  

**Respuesta:**  

- **Hardware**: parte física (CPU, memoria, disco, etc.).  
- **Sistema Operativo (SO)**: software que gestiona el hardware y ofrece servicios a las aplicaciones (ejemplo: Linux, Windows).  
- **Aplicación**: programas que usa el usuario y que se apoyan en el SO (ejemplo: navegador, editor de texto).  

---

1. Define qué es un **proceso** y en qué se diferencia de un **programa**.  
Un proceso es una entidad que el sistema esta gestionando, la diferencia es que un programa crea esos procesos

2. Explica qué es el **kernel** y su papel en la gestión de procesos.  
El kernel actua como si fuera un intermediario entre el software y el hardware, administra la creacion y detencion de procesos y la asignacion de cada componente del dispositivo.

3. ¿Qué son **PID** y **PPID**? Explica con un ejemplo.  
el PID es el identificativo que se asigna a cada proceso cuando es creado, y el PPID es el identificativo del proceso padre, 

por ejemplo, si ponemos un comando en la consola y lo pausamos durante 30 segundos y luego usamos ``ps -f``
```bash
UID   PID  PPID  CMD
fran 2451  2430  -bash
fran 2602  2451  sleep 30
```

en este caso podemos ver que -bash tiene como PPID 2430 que seguramente sea la terminal o parte de el, luego a su vez tiene como PID propio el 2451, y cuando lo pausamos durante 30 segundos, se ve que el PPID de este es el de -bash, significando que este es el identificador padre, y su propio PID  es 2602

4. Describe qué es un **cambio de contexto** y por qué es costoso.  
el cambio de contexto surge cuando la CPU interrumpe un proceso para ejecutar otro,
es costos porque se tiene que hacer opciones de guardado de memoria.

5. Explica qué es un **PCB (Process Control Block)** y qué información almacena.  

6. Diferencia entre **proceso padre** y **proceso hijo**.  
7. Explica qué ocurre cuando un proceso queda **huérfano** en Linux.  
8. ¿Qué es un proceso **zombie**? Da un ejemplo de cómo puede ocurrir.  
9. Diferencia entre **concurrencia** y **paralelismo**.  
10. Explica qué es un **hilo (thread)** y en qué se diferencia de un proceso.  

---