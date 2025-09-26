<?php

/**
 * Guarda tweets en tweets.txt con fecha y hora, muestra los últimos 5.
 */

// Escritura
date_default_timezone_set('Europe/Madrid');
$tweets = [
    "Acabo de aprender a manejar archivos en PHP. #PHP #Archivos",
    "¡Qué día tan soleado! Perfecto para una caminata. #Sol #Naturaleza",
    "Estoy leyendo un libro fascinante sobre historia antigua. #Lectura #Historia",
    "La tecnología avanza rápidamente, es increíble. #Tecnología #Futuro",
    "Disfrutando de una taza de café mientras trabajo. #Café #Trabajo
"
];
$archivo = fopen("resources/tweets.txt", "a");
foreach ($tweets as $tweet) {
    $entrada = "[" . date("d/m/Y H:i:s") . "] " . $tweet . "\n";
    fwrite($archivo, $entrada);
}
fclose($archivo);

// Lectura
$archivo = fopen("resources/tweets.txt", "r");
$contenido = fread($archivo, filesize("resources/tweets.txt"));
$lineas = explode("\n", trim($contenido));
$ultimosTweets = array_slice($lineas, -5);
fclose($archivo);

// Mostrar últimos 5 tweets
echo "Últimos 5 Tweets:\n";
foreach ($ultimosTweets as $tweet) {
    echo $tweet . "\n";
}
