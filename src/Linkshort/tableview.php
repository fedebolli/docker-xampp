<?php
session_start();
require_once 'database.php';
$ID_USER = $_SESSION['id_user'];


$sql = "SELECT * FROM Link WHERE id_user = '$ID_USER'";

    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<div style='font-family: Arial, Helvetica, sans-serif; color:white;'>"; 
        while ($row = $result->fetch_assoc()) {
            echo "<div style='background-color: #444; border-radius: 10px; padding: 15px; margin-bottom: 10px;'>"; // Styles for each entry
            echo "<div style='margin-bottom: 5px; color:white;'>"; // Add margin below
            echo "<strong style='display: block; color:white;'>LINK CORTO:</strong> ";
            echo "<a href='" . htmlspecialchars($row["link_corto"]) . "' target='_blank' style='color: #007bff; text-decoration: none; color:white;'>";
            echo htmlspecialchars($row["link_corto"]);
            echo "</a>";
            echo "</div>";
    
            echo "<div style='margin-bottom: 5px; color:white;'>"; 
            echo "<strong style='display: block; color:white;'>LINK ORIGINALE:</strong> ";
            echo "<a href='" . htmlspecialchars($row["link_originale"]) . "' target='_blank' style='color: #007bff; text-decoration: none; color:white;'>";
            echo htmlspecialchars($row["link_originale"]);
            echo "</a>";
            echo "</div>";
    
            echo "<div style='margin-bottom: 0px; color:white;'>"; //reduced from 5 to 0
            echo "<strong style='display: block; color:white;'>NUMERO VISITE:</strong> " . $row["n_visite"];
            


            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<div style='font-family: Arial, Helvetica, sans-serif; padding: 15px; color:white;'>Nessun messaggio trovato per questa chat.</div>";
    }
    
?>