<?php

$host = 'db';
$dbname = 'Chatroom';
$user = 'user';
$password = 'user';
$port = 3306;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>