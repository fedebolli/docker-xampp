<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM User WHERE Name = ?;";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) 
    {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) 
        {
            echo "Username già utilizzato " . $stmt->error;
        } 
        else 
        {
            $sql = "INSERT INTO User (Name, Password) VALUES (?, ?);";
            $stmt = $connection->prepare($sql);
        
            if ($stmt) 
            {
                // Associare i valori alla query
                $stmt->bind_param("ss", $username, $password);
                
                if ($stmt->execute()) 
                {
                    header('Location: login.html');
                } 
                else 
                {
                    echo "Errore durante l'inserimento: " . $stmt->error;
                }
        
                $stmt->close();
            } 
            else 
            {
                echo "Errore nella preparazione della query: " . $connection->error;
            }
        
        }
    }
}



?>