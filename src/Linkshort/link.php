<?php
session_start();
require_once 'database.php';

if (isset($_SESSION['id_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID_USER = $_SESSION['id_user'];

    $LINK_ORIGINALE = $_POST['link'];

    // Genera un link corto casuale
    $LINK_SHORT = 'https://3000-idx-docker-xampp-1736234818767.cluster-rcyheetymngt4qx5fpswua3ry4.cloudworkstations.dev/Linkshort/redirect.php?short=' . substr(md5(uniqid(true)), 0, 6);

    // Utilizza prepared statements per prevenire SQL injection
    $sql = "INSERT INTO Link (link_corto, link_originale, n_visite, id_user) VALUES (?, ?, 0, ?)";
    
    // Prepara lo statement
    $stmt = $connection->prepare($sql);
    
    // Associa i parametri e i loro tipi
    $stmt->bind_param("ssi", $LINK_SHORT, $LINK_ORIGINALE, $ID_USER);

    // Esegue lo statement
    if ($stmt->execute() ) {
      header("Location: link.html");
    } else {
      echo "Errore durante l'inserimento nel database: " . $stmt->error;
    }
    $stmt->close();
    $connection->close();    
}
?>