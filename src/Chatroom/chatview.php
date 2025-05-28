<?php

require_once 'database.php';


$sql = "SELECT * FROM Chat";   
$result = $connection->query($sql);
if (isset($result)) {
    if ($result->num_rows > 0) {
        // Ciclo su ogni riga dei risultati
        while ($row = $result->fetch_assoc()) {
          
            // Inizia il form per ogni riga dei risultati
            echo '<form action="chat.php" method="GET" class="chat-form">';
    
            // Campo nascosto per passare l'id_chat nella query string
            echo '<input type="hidden" name="id_chat" value="' . ($row['ID'] ?? '') . '">';
    
            // Pulsante per inviare il form
            echo '<button type="submit"  class="chat-button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">' . ($row['Name'] ?? '') . '</button>';
    
            // Fine del form
            echo '</form><hr>';
        }
    } else {
        echo "Nessuna chat trovata.";
    }
}
// Add style to the button on hover
echo '<style>
    .chat-button:hover {
        background-color: #367C39;
    }
</style>';


