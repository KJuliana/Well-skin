<?php
// Возвращает экземпляр подключения
function db() {
    $servername = "localhost";
    $username = "root";
    $password = "7KoroJuli7";
    $dbname = "HS";

    // Create connection
    $db = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    $error = $db->connect_error;
    if ($error) {
        die("Connection failed: " . $error);
    }

    return $db;
}