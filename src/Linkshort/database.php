<?php

$host = 'db';
$user = 'user';
$password = 'user';
$dbname = 'Linkshort';
$port = 3306;

$connection = new mysqli($host, $user, $password, $dbname, $port);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
