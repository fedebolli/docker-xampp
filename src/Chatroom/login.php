<?php
require_once 'database.php';

function loginUser($username, $password, $conn) {
    $response = array();
    
    
    if ($stmt = $conn->prepare("SELECT * FROM User WHERE username = ?")) {
        $stmt->bind_param("s", $username);
         $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['Password']) {
                $response['status'] = 'success';
                $response['message'] = 'Login successful!';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Incorrect password.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'User not found.';
        }
        $stmt->close();
       
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database Error.';
    }
    
    return $response;
}


$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$response = array();
if (isset($username) && isset($password)) {
    $response = loginUser($username, $password, $conn);
}
header('Content-Type: application/json');
echo json_encode($response);
