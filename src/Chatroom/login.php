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
    

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Redirect to register.html if the request is a GET request (from the register button)
    header('Location: register.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

        }
        
    }



