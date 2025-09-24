# <img src=../../../../../images/computer.png width="40"> Code, Learn & Practice  
**Procesos y Servicios (modo alumno, sin root) — Trabajo en `$HOME/dam` con *user units* de systemd**

> **Importante:** Esta guía está adaptada para **usuarios sin privilegios de root**.  
> Todo se hace **en tu carpeta** `~/dam` usando **systemd --user** (un administrador por usuario), sin tocar `/etc` ni `/usr/local`.  
> Pega **salidas reales** y responde a las preguntas cortas.

---

## Preparación

Crea tu área de trabajo y variables útiles:

```bash
mkdir -p ~/dam/{bin,logs,units}
export DAM=~/dam
echo 'export DAM=~/dam' >> ~/.bashrc
```

Comprobar versión de systemd y que el *user manager* está activo:

```bash
systemctl --user --version | head -n1
systemctl --user status --no-pager | head -n5
```
**Pega salida aquí:**

```text
systemd 255 (255.4-1ubuntu8.6)

a108pc27
    State: running
    Units: 261 loaded (incl. loaded aliases)
     Jobs: 0 queued
   Failed: 0 units

```

**Reflexiona la salida:**

```text
en el primer comando se puede ver la version del sistema operativo y el nombre de usuario.
El head significa el numero de lineas de ese comando que quieres que salga en la terminal.

en el segundo comando se ve el estado del dispositivo, los servicios que esta haciendo y cuales ha fallado
```

---

## Bloque 1 — Conceptos (breve + fuentes)

1) ¿Qué es **systemd** y en qué se diferencia de SysV init?  

**Respuesta:**  
 systemd es un sistema que gestiona servicios y servicios de inicio para linux, mientras que SysV se centra en la detencion de estos servicios

Fuentes: https://www.reddit.com/r/linuxquestions/comments/18y8rz2/what_exactly_is_systemd_sysvinit_and_runit/?tl=es-es

2) **Servicio** vs **proceso** (ejemplos).  

**Respuesta:**  
Los servicios son un conjunto de procesos que se ejecutan en segundo plano sin una interfaz grafica que son administrados por un programa como systemd. Un ejemplo es un servidor web o tambien lo puede ser un Administrador de contraseñas.
 _Fuentes:_ https://www.reddit.com/r/explainlikeimfive/comments/1n6jm99/eli5_what_is_the_difference_between_a_process_and/?tl=es-419

3) ¿Qué son los **cgroups** y para qué sirven?  

**Respuesta:**  
los cgroups son una funcionalidad del kernel de linux que controlan cuantos recursos (memoria,CPU o disco) van destinados a cada proceso

_Fuentes:_ https://sergiobelkin.com/posts/que-son-los-cgroups-y-para-que-sirven/

4) ¿Qué es un **unit file** y tipos (`service`, `timer`, `socket`, `target`)?  

**Respuesta:**  
un unit file describe un servicio que utiliza el sistema que define como el sistema debe de gestionar esos procesos, services es a los procesos demonios, los eventos programados con .timer, los procesos de red con .socket, y servicios logicos con .target.
_Fuentes:_  https://wiki.archlinux.org/title/Systemd_(Espa%C3%B1ol)

5) ¿Qué hace `journalctl` y cómo ver logs **de usuario**?  

**Respuesta:**  

journalctl sirve para consultar los registros del sistema que han sido manejados o gestionados por systemd.

_Fuentes:_ https://www.ionos.es/digitalguide/servidores/herramientas/que-es-journalctl/

---

## Bloque 2 — Práctica guiada (todo en tu `$DAM`)

> Si un comando pide permisos que no tienes, usa la **versión `--user`** o consulta el **ayuda** con `--help` para alternativas.

### 2.1 — PIDs básicos

**11.** PID de tu shell y su PPID.

```bash
echo "PID=$$  PPID=$PPID"
```
**Salida:**

```text
PID=11771 PPID=11762
```

**Pregunta:** ¿Qué proceso es el padre (PPID) de tu shell ahora?  

**Respuesta:**
dam        11771   11762  0 17:12 pts/0 00:00:00 bash


---

**12.** PID del `systemd --user` (manager de usuario) y explicación.

```bash
pidof systemd --user || pgrep -u "$USER" -x systemd
```

**Salida:**

```text
pgrep -u "$USER" -x systemd

3370
```
**Pregunta:** ¿Qué hace el *user manager* de systemd para tu sesión?  

**Respuesta:**
gestiona las unidades de la sesion del usuario   
---

### 2.2 — Servicios **de usuario** con systemd

Vamos a crear un servicio sencillo y un timer **en tu carpeta** `~/.config/systemd/user` o en `$DAM/units` (usaremos la primera para que `systemctl --user` lo encuentre).

**13.** Prepara directorios y script de práctica.

```bash
mkdir -p ~/.config/systemd/user "$DAM"/{bin,logs}
cat << 'EOF' > "$DAM/bin/fecha_log.sh"
#!/usr/bin/env bash
mkdir -p "$HOME/dam/logs"
echo "$(date --iso-8601=seconds) :: hello from user timer" >> "$HOME/dam/dam/logs/fecha.log"
EOF
chmod +x "$DAM/bin/fecha_log.sh"
```

**14.** Crea el servicio **de usuario** `fecha-log.service` (**Type=simple**, ejecuta tu script).

```bash
cat << 'EOF' > ~/.config/systemd/user/fecha-log.service
[Unit]
Description=Escribe fecha en $HOME/dam/logs/fecha.log

[Service]
Type=simple
ExecStart=%h/dam/bin/fecha_log.sh
EOF

systemctl --user daemon-reload
systemctl --user start fecha-log.service
systemctl --user status fecha-log.service --no-pager -l | sed -n '1,10p'
```
**Salida (pega un extracto):**
```text

2025-09-23T18:36:46+01:00 :: hello from user timer
```
**Pregunta:** ¿Se creó/actualizó `~/dam/logs/fecha.log`? Muestra las últimas líneas:

```bash
tail -n 5 "$DAM/logs/fecha.log"
```

**Salida:**

```text
2025-09-23T18:36:46+01:00 :: hello from user timer
```

**Reflexiona la salida:**

```text

```

---

**15.** Diferencia **enable** vs **start** (modo usuario). Habilita el **timer**.

```bash
cat << 'EOF' > ~/.config/systemd/user/fecha-log.timer
[Unit]
Description=Timer (usuario): ejecuta fecha-log.service cada minuto

[Timer]
OnCalendar=*:0/1
Unit=fecha-log.service
Persistent=true

[Install]
WantedBy=timers.target
EOF

systemctl --user daemon-reload
systemctl --user enable --now fecha-log.timer
systemctl --user list-timers --all | grep fecha-log || true
```

**Salida (recorta):**

```text
Tue 2025-09-23 18:40:00 WEST   4s -                                       - fecha-log.timer                fecha-log.service

```
**Pregunta:** ¿Qué diferencia hay entre `enable` y `start` cuando usas `systemctl --user`?  

**Respuesta:**
enable configura un servicio para que arranque automaticamente cuando se inicie el sistema, start lo inicia en la misma sesion pero no se iniciara en el arranque. 

se usa `systemctl --user` cuando se quiere gestionar algun servicio   
---

**16.** Logs recientes **del servicio de usuario** con `journalctl --user`.

```bash
journalctl --user -u fecha-log.service -n 10 --no-pager
```

**Salida:**

```text
sep 23 18:36:46 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.
sep 23 18:40:58 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.
sep 23 18:41:58 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.
sep 23 18:42:58 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.
sep 23 18:43:58 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.
sep 23 18:44:58 a108pc27 systemd[3370]: Started fecha-log.service - Escribe fecha en $HOME/dam/logs/fecha.log.

```
**Pregunta:** ¿Ves ejecuciones activadas por el timer? ¿Cuándo fue la última?  

**Respuesta:**
la ultima fue a las 18:44:58
---

### 2.3 — Observación de procesos sin root

**17.** Puertos en escucha (lo que puedas ver como usuario).

```bash
lsof -i -P -n | grep LISTEN || ss -lntp
```
**Salida:**

```text
<pre>State   Recv-Q   Send-Q     Local Address:Port      Peer Address:Port  Process  
LISTEN  0        64               0.0.0.0:2049           0.0.0.0:*              
LISTEN  0        64               0.0.0.0:34183          0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:111            0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:8000           0.0.0.0:*              
LISTEN  0        4096           127.0.0.1:631            0.0.0.0:*              
LISTEN  0        4096       127.0.0.53%lo:53             0.0.0.0:*              
LISTEN  0        4096          127.0.0.54:53             0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:59131          0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:48825          0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:47535          0.0.0.0:*              
LISTEN  0        32         192.168.122.1:53             0.0.0.0:*              
LISTEN  0        4096             0.0.0.0:46329          0.0.0.0:*              
LISTEN  0        64                  [::]:2049              [::]:*              
LISTEN  0        4096                [::]:50377             [::]:*              
LISTEN  0        4096                   *:22                   *:*              
LISTEN  0        511                    *:80                   *:*              
LISTEN  0        4096                [::]:111               [::]:*              
LISTEN  0        4096                [::]:8000              [::]:*              
LISTEN  0        4096               [::1]:631               [::]:*              
LISTEN  0        4096                [::]:41071             [::]:*              
LISTEN  0        4096                   *:9100                 *:*              
LISTEN  0        4096                [::]:48831             [::]:*              
LISTEN  0        4096                [::]:47419             [::]:*              
LISTEN  0        64                  [::]:45323             [::]:*        </pre>
```
**Pregunta:** ¿Qué procesos *tuyos* están escuchando? (si no hay, explica por qué)  

**Respuesta:**

---

**18.** Ejecuta un proceso bajo **cgroup de usuario** con límite de memoria.

```bash
systemd-run --user --scope -p MemoryMax=50M sleep 200
ps -eo pid,ppid,cmd,stat | grep "[s]leep 200"
```

**Salida:**

```text
Running as unit: run-r7b18e527ad754cda9beaef0a6b49785c.scope; invocation ID: 9b3b78d549864a3288d70e013609a097

```
**Pregunta:** ¿Qué ventaja tiene lanzar con `systemd-run --user` respecto a ejecutarlo “a pelo”?  

**Respuesta:**
te proporciona un control mas integrado y seguro sobre los procesos, ya que facilita su monitorizacion y gestion.
---

**19.** Observa CPU en tiempo real con `top` (si tienes `htop`, también vale).

```bash
top -b -n 1 | head -n 15
```
**Salida (resumen):**

```bashs
top - 18:50:50 up  2:56,  1 user,  load average: 0,74, 0,56, 0,42
Tareas: 411 total,   1 ejecutar,  408 hibernar,    1 detener,    1 zombie
%Cpu(s):  1,4 us,  1,4 sy,  0,0 ni, 96,4 id,  0,7 wa,  0,0 hi,  0,0 si,  0,0 st 
MiB Mem :  31453,3 total,  23758,5 libre,   4403,7 usado,   3763,3 búf/caché    
MiB Intercambio:   2048,0 total,   2048,0 libre,      0,0 usado.  27049,6 dispon

    PID USUARIO   PR  NI    VIRT    RES    SHR S  %CPU  %MEM     HORA+ ORDEN
  13433 dam       20   0 1161,5g 440904  79816 S   9,1   1,4   1:26.74 code
  54489 dam       20   0   17224   5760   3584 R   9,1   0,0   0:00.02 top
      1 root      20   0   23352  13812   9204 S   0,0   0,0   0:01.77 systemd
      2 root      20   0       0      0      0 S   0,0   0,0   0:00.01 kthreadd
      3 root      20   0       0      0      0 S   0,0   0,0   0:00.00 pool_wo+
      4 root       0 -20       0      0      0 I   0,0   0,0   0:00.00 kworker+
      5 root       0 -20       0      0      0 I   0,0   0,0   0:00.00 kworker+
      6 root       0 -20       0      0      0 I   0,0   0,0   0:00.00 kworker+

```
**Pregunta:** ¿Cuál es tu proceso con mayor `%CPU` en ese momento?  

**Respuesta:**
 13433 dam       20   0 1161,5g 440904  79816 S   9,1   1,4   1:26.74 code
---

**20.** Traza syscalls de **tu propio proceso** (p. ej., el `sleep` anterior).
> Nota: Sin root, no podrás adjuntarte a procesos de otros usuarios ni a algunos del sistema.

```bash
pid=$(pgrep -u "$USER" -x sleep | head -n1)
strace -p "$pid" -e trace=nanosleep -tt -c -f 2>&1 | sed -n '1,10p'
```

**Salida (fragmento):**

```text

```
**Pregunta:** Explica brevemente la syscall que observaste.  

**Respuesta:**

---

### 2.4 — Estados y jerarquía (sin root)

**21.** Árbol de procesos con PIDs.

```bash
pstree -p | head -n 50
```

**Salida (recorta):**

```bash
systemd(1)-+-ModemManager(1866)-+-{ModemManager}(1876)
           |                    |-{ModemManager}(1879)
           |                    `-{ModemManager}(1881)
           |-NetworkManager(1842)-+-{NetworkManager}(1871)
           |                      |-{NetworkManager}(1872)
           |                      `-{NetworkManager}(1873)
           |-accounts-daemon(1163)-+-{accounts-daemon}(1188)
           |                       |-{accounts-daemon}(1189)
           |                       `-{accounts-daemon}(1838)
           |-agetty(2257)
           |-apache2(2327)-+-apache2(2340)
           |               |-apache2(2341)
           |               |-apache2(2342)
           |               |-apache2(2343)
           |               `-apache2(2344)
           |-at-spi2-registr(3723)-+-{at-spi2-registr}(3732)
           |                       |-{at-spi2-registr}(3733)
           |                       `-{at-spi2-registr}(3734)
           |-avahi-daemon(1165)---avahi-daemon(1255)
           |-blkmapd(1122)
           |-chrome_crashpad(12099)-+-{chrome_crashpad}(12100)
           |                        `-{chrome_crashpad}(12101)
           |-colord(2036)-+-{colord}(2039)
           |              |-{colord}(2040)
           |              `-{colord}(2042)
           |-containerd(2017)-+-{containerd}(2038)
           |                  |-{containerd}(2043)
           |                  |-{containerd}(2044)
           |                  |-{containerd}(2045)
           |                  |-{containerd}(2046)
           |                  |-{containerd}(2103)
           |                  |-{containerd}(2104)
           |                  |-{containerd}(2110)
           |                  |-{containerd}(2111)
           |                  |-{containerd}(2112)
           |                  |-{containerd}(2113)
           |                  |-{containerd}(2114)
           |                  |-{containerd}(2117)
           |                  |-{containerd}(2118)
           |                  |-{containerd}(2119)
           |                  `-{containerd}(2120)
           |-containerd-shim(3190)-+-apache2(3213)-+-apache2(3331)
           |                       |               |-apache2(3332)
           |                       |               |-apache2(3333)
           |                       |               |-apache2(3334)
           |                       |               `-apache2(3335)
           |                       |-{containerd-shim}(3192)
           |                       |-{containerd-shim}(3193)
           |                       |-{containerd-shim}(3194)
           |                       |-{containerd-shim}(3195)

```
**Pregunta:** ¿Bajo qué proceso aparece tu `systemd --user`?  

**Respuesta:**
-ModemManager(1866)
---

**22.** Estados y relación PID/PPID.

```bash
ps -eo pid,ppid,stat,cmd | head -n 20
```
**Salida:**

```bash
 PID    PPID STAT CMD
      1       0 Ss   /sbin/init splash
      2       0 S    [kthreadd]
      3       2 S    [pool_workqueue_release]
      4       2 I<   [kworker/R-rcu_g]
      5       2 I<   [kworker/R-rcu_p]
      6       2 I<   [kworker/R-slub_]
      7       2 I<   [kworker/R-netns]
     10       2 I<   [kworker/0:0H-events_highpri]
     12       2 I<   [kworker/R-mm_pe]
     13       2 I    [rcu_tasks_kthread]
     14       2 I    [rcu_tasks_rude_kthread]
     15       2 I    [rcu_tasks_trace_kthread]
     16       2 S    [ksoftirqd/0]
     17       2 I    [rcu_preempt]
     18       2 S    [migration/0]
     19       2 S    [idle_inject/0]
     20       2 S    [cpuhp/0]
     21       2 S    [cpuhp/1]
     22       2 S    [idle_inject/1]

```
**Pregunta:** Explica 3 flags de `STAT` que veas (ej.: `R`, `S`, `T`, `Z`, `+`).  

**Respuesta:**
La R significa que el proceso esta en ejecucion o esta activo, la S significa que esta en hinbernacion o que esta inactivo y la T significa que el proceso esta detenido.
---

**23.** Suspende y reanuda **uno de tus procesos** (no crítico).

```bash
# Crea un proceso propio en segundo plano
sleep 120 &
pid=$!
# Suspende
kill -STOP "$pid"
# Estado
ps -o pid,stat,cmd -p "$pid"
# Reanuda
kill -CONT "$pid"
# Estado
ps -o pid,stat,cmd -p "$pid"
```
**Pega los dos estados (antes/después):**

```text
2 62078

[2]+  Detenido                sleep 120
    PID STAT CMD
  62078 T    bash
    PID STAT CMD
  62078 S    sleep 120

```
**Pregunta:** ¿Qué flag indicó la suspensión?  

**Respuesta:**

---

**24. (Opcional)** Genera un **zombie** controlado (no requiere root).

```bash
cat << 'EOF' > "$DAM/bin/zombie.c"
#include <stdlib.h>
#include <unistd.h>
int main() {
  if (fork() == 0) { exit(0); } // hijo termina
  sleep(60); // padre no hace wait(), hijo queda zombie hasta que padre termine
  return 0;
}
EOF
gcc "$DAM/bin/zombie.c" -o "$DAM/bin/zombie" && "$DAM/bin/zombie" &
ps -el | grep ' Z '
```
**Salida (recorta):**

```bash
[3] 62638
0 Z  1001    8067    8039  0  80   0 -     0 -      ?        00:00:00 sd_espeak-ng-mb

```
**Pregunta:** ¿Por qué el estado `Z` y qué lo limpia finalmente?  

**Respuesta:**
la Z hace referencia a que es un proceso zombie
---

### 2.5 — Limpieza (solo tu usuario)

Detén y deshabilita tu **timer/servicio de usuario** y borra artefactos si quieres.

```bash
systemctl --user disable --now fecha-log.timer
systemctl --user stop fecha-log.service
rm -f ~/.config/systemd/user/fecha-log.{service,timer}
systemctl --user daemon-reload
rm -rf "$DAM/bin" "$DAM/logs" "$DAM/units"
```

---

## ¿Qué estás prácticando?
- [x] Pegaste **salidas reales**.  
- [x] Explicaste **qué significan**.  
- [x] Usaste **systemd --user** y **journalctl --user**.  
- [x] Probaste `systemd-run --user` con límites de memoria.  
- [x] Practicaste señales (`STOP`/`CONT`), `pstree`, `ps` y `strace` **sobre tus procesos**.

---

## Licencia 📄
Licencia **Apache 2.0** — ver [LICENSE.md](https://github.com/jpexposito/code-learn-practice/blob/main/LICENSE).

