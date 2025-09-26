# Archivos PHP - Tareas

## Tarea 1: Lectura de archivo

**Código:**
```php
<?php
// Leer el contenido de un archivo
$archivo = "ejemplo.txt";
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    echo "Contenido del archivo:\n$contenido";
} else {
    echo "El archivo no existe.";
}
?>
```

**Resultado de consola:**
```
Contenido del archivo:
Este es un archivo de ejemplo para las tareas de PHP.
Estamos aprendiendo a manipular archivos.
```

## Tarea 2: Escritura en archivo

**Código:**
```php
<?php
// Escribir contenido en un archivo
$archivo = "nuevo.txt";
$texto = "Este es un nuevo archivo creado desde PHP.\n";
$texto .= "Fecha de creación: " . date("Y-m-d H:i:s");

if (file_put_contents($archivo, $texto)) {
    echo "Archivo creado correctamente.";
} else {
    echo "Error al crear el archivo.";
}
?>
```

**Resultado de consola:**
```
Archivo creado correctamente.
```

## Tarea 3: Manipulación de directorios

**Código:**
```php
<?php
// Listar archivos en un directorio
$directorio = "./";
if (is_dir($directorio)) {
    $archivos = scandir($directorio);
    echo "Archivos en el directorio:\n";
    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            echo "- $archivo\n";
        }
    }
} else {
    echo "El directorio no existe.";
}
?>
```

**Resultado de consola:**
```
Archivos en el directorio:
- ejemplo.txt
- index.php
- nuevo.txt
- tareas.php
```

## Tarea 4: Procesamiento de CSV

**Código:**
```php
<?php
// Leer un archivo CSV
$archivo = "datos.csv";
if (file_exists($archivo)) {
    $handle = fopen($archivo, "r");
    echo "Datos del archivo CSV:\n";
    
    while (($datos = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "Nombre: {$datos[0]}, Edad: {$datos[1]}, Ciudad: {$datos[2]}\n";
    }
    
    fclose($handle);
} else {
    echo "El archivo CSV no existe.";
}
?>
```

**Resultado de consola:**
```
Datos del archivo CSV:
Nombre: Ana, Edad: 25, Ciudad: Madrid
Nombre: Juan, Edad: 30, Ciudad: Barcelona
Nombre: María, Edad: 22, Ciudad: Valencia
```

## Tarea 5: Subida de archivos

**Código:**
```php
<?php
// Verificar si se ha enviado un archivo
if(isset($_FILES['archivo'])) {
    $archivo_nombre = $_FILES['archivo']['name'];
    $archivo_tmp = $_FILES['archivo']['tmp_name'];
    $ruta_destino = "uploads/" . $archivo_nombre;
    
    // Crear directorio si no existe
    if (!is_dir("uploads")) {
        mkdir("uploads");
    }
    
    if(move_uploaded_file($archivo_tmp, $ruta_destino)) {
        echo "Archivo subido correctamente a $ruta_destino";
    } else {
        echo "Error al subir el archivo";
    }
} else {
    echo "No se ha seleccionado ningún archivo";
}
?>
```

**Resultado de consola:**
```
Archivo subido correctamente a uploads/documento.pdf
```

## Tarea 6: Eliminación de archivos

**Código:**
```php
<?php
// Eliminar un archivo
$archivo = "temporal.txt";

// Primero creamos un archivo temporal para el ejemplo
file_put_contents($archivo, "Este es un archivo temporal que será eliminado.");

if (file_exists($archivo)) {
    if (unlink($archivo)) {
        echo "El archivo $archivo ha sido eliminado correctamente.";
    } else {
        echo "No se pudo eliminar el archivo $archivo.";
    }
} else {
    echo "El archivo no existe.";
}
?>
```

**Resultado de consola:**
```
El archivo temporal.txt ha sido eliminado correctamente.
```

## Tarea 7: Información de archivo

**Código:**
```php
<?php
// Obtener información de un archivo
$archivo = "ejemplo.txt";

if (file_exists($archivo)) {
    echo "Información del archivo $archivo:\n";
    echo "Tamaño: " . filesize($archivo) . " bytes\n";
    echo "Tipo: " . filetype($archivo) . "\n";
    echo "Fecha de última modificación: " . date("d/m/Y H:i:s", filemtime($archivo)) . "\n";
    echo "Permisos: " . substr(sprintf("%o", fileperms($archivo)), -4) . "\n";
} else {
    echo "El archivo no existe.";
}
?>
```

**Resultado de consola:**
```
Información del archivo ejemplo.txt:
Tamaño: 78 bytes
Tipo: file
Fecha de última modificación: 26/09/2025 10:15:33
Permisos: 0644
```

## Tarea 8: Lectura línea por línea

**Código:**
```php
<?php
// Leer un archivo línea por línea
$archivo = "ejemplo.txt";

if (file_exists($archivo)) {
    $handle = fopen($archivo, "r");
    $linea_num = 1;
    
    echo "Contenido línea por línea:\n";
    while (($linea = fgets($handle)) !== false) {
        echo "Línea $linea_num: $linea";
        $linea_num++;
    }
    
    fclose($handle);
} else {
    echo "El archivo no existe.";
}
?>
```

**Resultado de consola:**
```
Contenido línea por línea:
Línea 1: Este es un archivo de ejemplo para las tareas de PHP.
Línea 2: Estamos aprendiendo a manipular archivos.
```

## Tarea 9: Copia de archivos

**Código:**
```php
<?php
// Copiar un archivo
$archivo_origen = "ejemplo.txt";
$archivo_destino = "ejemplo_copia.txt";

if (file_exists($archivo_origen)) {
    if (copy($archivo_origen, $archivo_destino)) {
        echo "El archivo ha sido copiado correctamente como $archivo_destino.";
    } else {
        echo "Error al copiar el archivo.";
    }
} else {
    echo "El archivo origen no existe.";
}
?>
```

**Resultado de consola:**
```
El archivo ha sido copiado correctamente como ejemplo_copia.txt.
```

## Tarea 10: Procesamiento de archivos JSON

**Código:**
```php
<?php
// Procesar archivo JSON
$archivo = "datos.json";
$datos = [
    "usuarios" => [
        ["nombre" => "Carlos", "edad" => 28, "rol" => "administrador"],
        ["nombre" => "Laura", "edad" => 34, "rol" => "editor"],
        ["nombre" => "Miguel", "edad" => 25, "rol" => "usuario"]
    ]
];

// Guardar datos en JSON
file_put_contents($archivo, json_encode($datos, JSON_PRETTY_PRINT));

// Leer datos JSON
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $json_data = json_decode($contenido, true);
    
    echo "Usuarios en el archivo JSON:\n";
    foreach ($json_data["usuarios"] as $usuario) {
        echo "- {$usuario['nombre']}, {$usuario['edad']} años, rol: {$usuario['rol']}\n";
    }
} else {
    echo "El archivo JSON no existe.";
}
?>
```

**Resultado de consola:**
```
Usuarios en el archivo JSON:
- Carlos, 28 años, rol: administrador
- Laura, 34 años, rol: editor
- Miguel, 25 años, rol: usuario
```

