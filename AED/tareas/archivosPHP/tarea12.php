<?php


/**
 * Guarda juegos con puntuaciones en ranking.txt, ordénalos y muestra el top 3.
 */


// Escritura
$archivo = fopen("resources/ranking.txt", "a");
$juegos = [
    ["nombre" => "Juego A", "puntuacion" => 150],
    ["nombre" => "Juego B", "puntuacion" => 300],
    ["nombre" => "Juego C", "puntuacion" => 250],
    ["nombre" => "Juego D", "puntuacion" => 400],
    ["nombre" => "Juego E", "puntuacion" => 100],
];

foreach ($juegos as $juego) {
    $entrada = $juego['nombre'] . "," . $juego['puntuacion'] . "\n";
    fwrite($archivo, $entrada);
}
fclose($archivo);

// Lectura y ordenación
$archivo = fopen("resources/ranking.txt", "r");
$contenido = fread($archivo, filesize("resources/ranking.txt"));
fclose($archivo);
$lineas = explode("\n", trim($contenido));
$datosJuegos = [];
foreach ($lineas as $linea) {
    list($nombre, $puntuacion) = explode(",", $linea);
    $datosJuegos[] = ["nombre" => $nombre, "puntuacion"
    => (int)$puntuacion];
}
usort($datosJuegos, function ($a, $b) {
    return $b['puntuacion'] <=> $a['puntuacion'];
});

// Mostrar top 3
echo "Top 3 Juegos:\n";
for ($i = 0; $i < min(3, count(
    $datosJuegos
)); $i++) {
    echo ($i + 1) . ". " . $datosJuegos[$i]['nombre'] . " - " . $datosJuegos[$i]['puntuacion'] . "\n";
}
