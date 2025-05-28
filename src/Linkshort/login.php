<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM User WHERE Name= '$username' AND Password = '$password'";   
    
    if ($result = $connection->query($sql)) {
        if ($result->num_rows > 0) {
            
             $row = $result->fetch_assoc();
             if($row){
                 $_SESSION['id_user'] = $row['ID'];
                 header("Location: link.html");
                 exit;
             }else{
                 header("Location: login.html?error=1");
                 exit;
             }
           
        } else {

             header("Location: login.html?error=1");
             exit;
         }
    }else {

        // No match found, redirect back to the login page with an error message
        header("Location: login.html?error=1"); 
    }
}

ob_end_flush();
?>
