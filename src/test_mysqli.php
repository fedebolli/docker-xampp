<?php

$host = 'db';
$dbname = 'root_db';
$user = 'user';
$password = 'user';
$port = 3306;

$connection = new mysqli($host, $user, $password, $dbname, $port);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "Connessione al database riuscita con mysqli!";
$connection->close();
?>
