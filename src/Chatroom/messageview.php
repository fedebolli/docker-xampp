<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{

    if($_GET != null)
    {

        $Chat_click = $connection->real_escape_string($_GET['id_chat']);
        $_SESSION['id_chat'] = $_GET['id_chat'];

    
        $sql = "SELECT id, text, time, state, id_user , id_chat
                FROM Message
                WHERE id_chat = '$Chat_click'
                ORDER BY time ASC";  

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {

            echo "<ul>"; 
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>ID:</strong> " . $row["id"];
                echo "<strong>Testo:</strong> " . htmlspecialchars($row["text"]);
                echo "<strong>Orario:</strong> " . $row["time"];
                echo "<strong>Stato:</strong> " . $row["state"];
                echo "<strong>ID Utente:</strong> " . $row["id_user"];
                echo "</li><hr>";
            }
            
            echo "</ul>";    
        } else {
                echo "Nessun messaggio trovato per questa chat.";
        }
    }
    else{
        //accesso senza stanza
        //$Chat_click = $connection->real_escape_string($_GET['id_chat']);
        $_SESSION['id_chat'] = 1;

    
        $sql = "SELECT id, text, time, state, id_user , id_chat
                FROM Message
                WHERE id_chat = 1
                ORDER BY time ASC";  

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {

            echo "<ul>"; 
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>ID:</strong> " . $row["id"];
                echo "<strong>Testo:</strong> " . htmlspecialchars($row["text"]);
                echo "<strong>Orario:</strong> " . $row["time"];
                echo "<strong>Stato:</strong> " . $row["state"];
                echo "<strong>ID Utente:</strong> " . $row["id_user"];
                echo "</li><hr>";
            }
            
            echo "</ul>";    
        } else {
                echo "Nessun messaggio trovato per questa chat.";
        }
    }
    

}
 else 
{
    echo "Richiesta non valida.";
}
?>