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
fuente: https://www.profesionalreview.com/2020/06/20/cual-es-la-diferencia-entre-un-programa-y-un-proceso/

2. Explica qué es el **kernel** y su papel en la gestión de procesos.  
El kernel actua como si fuera un intermediario entre el software y el hardware, administra la creacion y detencion de procesos y la asignacion de cada componente del dispositivo.
fuente: https://www.hackio.com/blog/que-es-el-kernel-cual-es-su-trabajo-y-como-funciona

3. ¿Qué son **PID** y **PPID**? Explica con un ejemplo.  
el PID es el identificativo que se asigna a cada proceso cuando es creado, y el PPID es el identificativo del proceso padre, 
fuente: https://labex.io/es/tutorials/linux-linux-process-displaying-271363

por ejemplo, si ponemos un comando en la consola y lo pausamos durante 30 segundos y luego usamos ``ps -f``
```bash
UID   PID  PPID  CMD
fran 2451  2430  -bash
fran 2602  2451  sleep 30
```

en este caso podemos ver que -bash tiene como PPID 2430 que seguramente sea la terminal o parte de el, luego a su vez tiene como PID propio el 2451, y cuando lo pausamos durante 30 segundos, se ve que el PPID de este es el de -bash, significando que este es el identificador padre, y su propio PID  es 2602

4. Describe qué es un **cambio de contexto** y por qué es costoso.  
fuente: https://www.profesionalreview.com/2023/08/15/cpu-cambio-contexto/
el cambio de contexto surge cuando la CPU interrumpe un proceso para ejecutar otro,
es costos porque se tiene que hacer opciones de guardado de memoria.

5. Explica qué es un **PCB (Process Control Block)** y qué información almacena.  
fuente: https://es.wikipedia.org/wiki/Bloque_de_control_del_proceso

Estructura de datos que guarda: PID, estado, contador de programa, registros, memoria asignada, archivos abiertos.


6. Diferencia entre **proceso padre** y **proceso hijo**.  
fuente: https://www.ibm.com/docs/es/aix/7.2.0?topic=processes-
   * Padre: proceso que crea otro.
   * Hijo: proceso creado con `fork()`. Hereda variables, pero es independiente.

7. Explica qué ocurre cuando un proceso queda **huérfano** en Linux. 
fuente: https://labex.io/es/lesson/process-termination
 Si el padre muere antes que el hijo, el proceso huérfano es adoptado por `init/systemd` (PPID cambia a 1).

8. ¿Qué es un proceso **zombie**? Da un ejemplo de cómo puede ocurrir.  
fuente: https://www.ibm.com/docs/es/aix/7.1.0?topic=processes-
 Proceso terminado pero que deja una entrada en la tabla hasta que el padre recoja su estado con `wait()`.
   Ejemplo: `sleep 10 &` → si el padre no hace `wait()`, queda zombie.

9. Diferencia entre **concurrencia** y **paralelismo**.  
fuente: https://www.oscarblancarteblog.com/2017/03/29/concurrencia-vs-paralelismo/
   * Concurrencia: varios procesos parecen ejecutarse al mismo tiempo (en una sola CPU).
   * Paralelismo: varios procesos se ejecutan literalmente al mismo tiempo (varias CPU).

10. Explica qué es un **hilo (thread)** y en qué se diferencia de un proceso.  
fuente: https://es.quora.com/Cu%C3%A1l-es-la-diferencia-entre-un-proceso-y-un-thread
* Hilo (thread): unidad más ligera de ejecución, comparte memoria con otros hilos del proceso.
* Proceso: tiene memoria y recursos propios.

---

## Bloque 2: Práctica con comandos en Linux

11. ```bash
    echo $$
    ```

    **Salida:** `4321`
    → Muestra el PID del shell actual.

12. ```bash
    echo $PPID
    ```

    **Salida:** `4210`
    → Muestra el PID del padre (ej: `bash`).

13. ```bash
    pidof systemd
    ```

    **Salida:** `1`
    → `systemd` siempre es el proceso inicial del sistema.

14. ```bash
    gedit &
    pidof gedit
    ```

    **Salida:** `5678`
    → Devuelve el PID del proceso gráfico abierto.

15. ```bash
    ps -e
    ```

    **Salida (ejemplo):**

    ```
      PID TTY          TIME CMD
        1 ?        00:00:01 systemd
     4321 pts/0    00:00:00 bash
     5678 ?        00:00:03 gedit
    ```

    * **PID**: identificador
    * **TTY**: terminal
    * **TIME**: tiempo CPU usado
    * **CMD**: comando ejecutado

16. ```bash
    ps -f
    ```

    **Salida:**

    ```
    UID   PID  PPID  C STIME TTY          TIME CMD
    fran 4321 4210   0 16:30 pts/0    00:00:00 bash
    fran 5678 4321   1 16:31 ?        00:00:01 gedit
    ```

    → Se ve que `gedit` (5678) es hijo de `bash` (4321).

17. ```bash
    pstree
    ```

    **Salida:**

    ```
    systemd─┬─NetworkManager
            ├─sshd───bash───gedit
            └─bash───ps
    ```

18. ```bash
    top
    ```

    **Salida parcial:**

    ```
    PID USER  %CPU %MEM COMMAND
    5678 fran  35   2.0 gedit
    ```

    → El proceso con más CPU es `gedit`.

19. ```bash
    sleep 100 &
    ps | grep sleep
    ```

    **Salida:**

    ```
    6789 pts/0    00:00:00 sleep
    ```

    → PID = 6789.

20. ```bash
    kill 6789
    ps | grep sleep
    ```

    **Salida:** *(nada)* → proceso terminado.

---

## Bloque 3: Procesos y jerarquía

21. ```bash
    pidof systemd
    ```

    **Salida:** `1`
    → `systemd` es el primer proceso, inicializa todo el sistema.

22. Si un proceso padre muere antes, su hijo pasa a ser adoptado por `systemd` (su PPID cambia a 1).

23. ```c
    // pequeño programa en C
    fork(); fork(); fork();
    ```

    → Genera varios hijos. Con `ps` se verán PIDs diferentes pero con el mismo padre.

24. Ejecutar `sleep 200` y pulsar `Ctrl+Z`.

    ```bash
    fg
    ```

    → El proceso vuelve a primer plano.

25. ```bash
    sleep 200 &
    jobs
    ```

    **Salida:**

    ```
    [1]+  Running   sleep 200 &
    ```

26. **Estados de proceso:**

    * **R (Running)**: en ejecución.
    * **S (Sleeping)**: esperando evento.
    * **Z (Zombie)**: terminado sin ser recogido.
    * **T (Stopped)**: detenido (ej: Ctrl+Z).

27. ```bash
    ps -eo pid,ppid,stat,cmd
    ```

    **Salida:**

    ```
    PID  PPID STAT CMD
      1     0 Ss   systemd
    ```

4321  4210 Ss   bash
6789  4321 S    sleep 100
\`\`\`

28. ```bash
    watch -n 1 ps -e
    ```

    → Muestra la lista de procesos actualizándose cada segundo.

29. Diferencia:

    * `&`: proceso en segundo plano, pero se cierra si cierras la terminal.
    * `nohup`: proceso sigue ejecutándose aunque cierres la sesión.

30. ```bash
    ulimit -a
    ```

    **Salida típica:**

    ```
    core file size          (blocks, -c) 0
    max user processes              (-u) 31174
    open files                      (-n) 1024
    ```

    → Muestra los límites de recursos de procesos.
