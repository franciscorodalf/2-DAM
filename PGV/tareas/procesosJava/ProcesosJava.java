package PGV.tareas.procesosJava;

import java.io.*;

public class ProcesosJava {
    public static void main(String[] args) throws Exception {

        ProcessBuilder pb1 = new ProcessBuilder("ps", "aux");
        pb1.redirectOutput(new File("PGV/tareas/procesosJava/resources/procesos.txt"));
        Process p1 = pb1.start();
        p1.waitFor();

        ProcessBuilder pb2 = new ProcessBuilder("sh", "-c", "grep java procesos.txt");
    pb2.redirectOutput(new File("PGV/tareas/procesosJava/resources/mis_procesos.txt"));
        Process p2 = pb2.start();
        p2.waitFor();

        ProcessBuilder pb3 = new ProcessBuilder("wc", "-l", "PGV/tareas/procesosJava/resources/mis_procesos.txt");
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

        if (numLineas > 3) {
            System.out.println("¡Cuidado, muchos procesos de Java activos!");
        }
    }
}
