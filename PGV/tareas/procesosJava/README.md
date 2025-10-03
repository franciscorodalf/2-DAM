# Actividad Final: Procesos en Java  

## Enunciado  
Diseña un programa en Java que:  
1. Liste los procesos (`ps aux`).  
2. Filtre solo los que contengan `java`.  
3. Guarde el resultado en `mis_procesos.txt`.  
4. Muestre en pantalla cuántas líneas tiene el archivo (`wc -l`).  
5. Si hay más de 3 procesos `java`, imprime:  
   `"¡Cuidado, muchos procesos de Java activos!"`.  

---

## Código en Java  

```java
import java.io.*;
import java.util.*;

public class ProcesosJava {
    public static void main(String[] args) throws Exception {

        // 1. Ejecutar "ps aux"
        ProcessBuilder pb1 = new ProcessBuilder("ps", "aux");
        pb1.redirectOutput(new File("procesos.txt"));
        Process p1 = pb1.start();
        p1.waitFor();

        // 2. Filtrar solo procesos con "java" y guardarlos en mis_procesos.txt
        ProcessBuilder pb2 = new ProcessBuilder("sh", "-c", "grep java procesos.txt");
        pb2.redirectOutput(new File("mis_procesos.txt"));
        Process p2 = pb2.start();
        p2.waitFor();

        // 3. Contar líneas del archivo (equivalente a wc -l)
        ProcessBuilder pb3 = new ProcessBuilder("wc", "-l", "mis_procesos.txt");
        Process p3 = pb3.start();

        int numLineas = 0;
        try (BufferedReader br = new BufferedReader(
                new InputStreamReader(p3.getInputStream()))) {
            String linea = br.readLine();
            if (linea != null) {
                numLineas = Integer.parseInt(linea.trim().split("\\s+")[0]);
                System.out.println("Procesos Java encontrados: " + numLineas);
            }
        }
        p3.waitFor();

        // 4. Comprobar si hay más de 3
        if (numLineas > 3) {
            System.out.println("¡Cuidado, muchos procesos de Java activos!");
        }
    }
}
````

---

## Resultado esperado en consola

```bash
Procesos Java encontrados: 2
```

(o, si hay más de 3 procesos Java)

```bash
Procesos Java encontrados: 5
¡Cuidado, muchos procesos de Java activos!
```
