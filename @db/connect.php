<?php
// Возвращает экземпляр подключения
function db() {
    $servername = "localhost";
    $username = "h163748_root";
    $password = "7KoroJuli7";
    $dbname = "h163748_hs";

    // Create connection
    $db = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    $error = $db->connect_error;
    if ($error) {
        die("Connection failed: " . $error);
    }

    return $db;
}