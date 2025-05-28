<?php

require_once 'database.php'; // Get db connection
$link_corto = $_GET['short'] ?? null;

if (empty($link_corto)) {
    echo "Invalid request.";
    exit;
}


$link_corto = "https://3000-idx-docker-xampp-1736234818767.cluster-rcyheetymngt4qx5fpswua3ry4.cloudworkstations.dev/Linkshort/redirect.php?short=" . $_GET['short'];

// Search the database for the short link.
$sql = "SELECT link_originale FROM Link WHERE link_corto = ?";

if ($stmt = $connection->prepare($sql)) {

    $stmt->bind_param("s", $link_corto);
    $stmt->execute();
    $stmt->bind_result($link_originale);
   

    if ($stmt->fetch()) {
        $stmt->close(); // Close the first statement before preparing a new one
        
        $update_sql = "UPDATE Link SET n_visite = n_visite + 1 WHERE link_corto = ?";
        if ($update_stmt = $connection->prepare($update_sql)) {
            $update_stmt->bind_param("s", $link_corto);
            $update_stmt->execute();
            $update_stmt->close();
        }
       
        header("Location: " . $link_originale);
        exit;
    } else {
        echo "Short link not found.";
    }
    
}
$stmt->close();
$connection->close();
?>
