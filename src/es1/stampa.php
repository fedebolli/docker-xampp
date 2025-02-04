<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['fname'];
    $cognome = $_POST['lname'];
    $username = $_POST['uname'];
    $data= $_POST['dataNascita'];
    $citta= $_POST['citta'];
    $genere= $_POST['genere'];

    echo $nome . "<br>";
    echo $username . "<br>";
    echo $cognome . "<br>";
    echo $citta . "<br>";
    echo $data . "<br>";
    echo $genere . "<br>";
}
?>