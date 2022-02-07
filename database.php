<?php 
// definisco i parametri per la connessione al database
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'university');
define('DB_PORT', 8889);

// istanzio connessione
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// controllo se la connessione è stata istanziata
if ($connection && $connection->connect_error) {
    echo 'connessione non riuscita' . $connection->connect_error;

    // e stoppo il programma
    die();
}
?>