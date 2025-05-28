<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanificare i dati ricevuti dal form
    $text = $connection->real_escape_string($_POST['message']);
    $state = false;
    $time = date('Y-m-d H:i:s');
    $id_chat = $_SESSION['id_chat'];
    $id_user = $_SESSION['id_user'];


    // Query preparata per maggiore sicurezza
    $sql = "INSERT INTO Message (text, state, time, id_user, id_chat) VALUES (?, ?, ?, ? ,?)";
    $stmt = $connection->prepare($sql);

    if ($stmt) {
        // Associare i valori alla query
        $stmt->bind_param("sisii", $text, $state, $time, $id_user, $id_chat);
        
        if ($stmt->execute()) {
            header('Location: chat.php?id_chat=' . $_SESSION["id_chat"]);

        } else {
            echo "Errore durante l'inserimento: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Errore nella preparazione della query: " . $connection->error;
    }

    $connection->close();
}
?>