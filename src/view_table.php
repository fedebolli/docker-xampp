<?php
require_once '../includes/db.php';

$tabel = "users";
$query = "SELECT * FROM $tabel";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table>";
    while ($column = $result->fetch_field()) {
        echo "<th>"
        echo $column->name;
        echo "</th>"
    }
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
} else {
    // Handle the case when there are no rows
    echo "No data found.";
}

echo "</table>";
?>
