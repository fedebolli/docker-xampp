<?php
require_once 'database.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)) {
        $response['status'] = 'error';
        $response['message'] = 'Username and password are required.';
    } else {
        $stmt = $conn->query("SELECT * FROM User WHERE username = '$username'");

        if ($stmt) {
            if ($stmt->num_rows > 0) {
                $response['status'] = 'error';
                $response['message'] = 'Username already exists.';
            } else {
                $insertStmt = $conn->query("INSERT INTO User (username, Password) VALUES ('$username', '$password')");
                if ($insertStmt) {
                    $response['status'] = 'success';
                    $response['message'] = 'User registered successfully!';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error registering user.';
                }
            }
        } else {
              $response['status'] = 'error';
              $response['message'] = 'Error query database.';
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

header('Content-Type: application/json');
echo json_encode($response);
?>