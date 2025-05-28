<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
            color: #e0e0e0;
        }
        button {
            background-color: #ff5252;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff1744;
        }

        .chat-container {
            display: flex;
            height: 100vh;
        }
        .room-list {
            width: 20%;
            background-color: #1f1f1f;
            color: #e0e0e0;
            padding: 10px;
            overflow-y: auto;
            border-right: 1px solid #333;
            position: relative;
        }
        .room-list h2 {
            text-align: center;
            color: #ff5252;
        }
        .room-list ul {
            list-style: none;
            padding: 0;
        }
        .room-list li {
            display: block;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .room-list li button{
            width: 100%;
            background-color: transparent;
            color:white;

            border-bottom: 1px solid #333;
            transition: background-color 0.3s;
        }
        .room-list li:hover {
            background-color: #333;
        }
        .logout-button {
            position: absolute;
            bottom: 10px;
        }
        .logout-button:hover {
            background-color: #ff1744;
        }
        .chat-room {
            width: 80%;
            padding: 10px;
            display: flex;
            flex-direction: column;
            background-color: #121212;
        }
        .messages {
            flex-grow: 1;
            overflow-y: auto;
            background-color: #1f1f1f;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
        }
        .message-input {
            display: flex;
            margin-top: 10px;
        }
        .message-input input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #333;
            background-color: #1f1f1f;
            color: #e0e0e0;
            border-radius: 5px 0 0 5px;
        }
        .message-input button {
            border-radius: 0 5px 5px 0;
        }

    </style>
</head>
<body>
    <div class="chat-container">
        <div action = 'chat.php' method = 'get' class="room-list">
            <h2>CHATROOM</h2>
            <?php
                include 'chatview.php';
            ?>
            <form action="logout.php" method="post">
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </div>
        <div class="chat-room">
            <div action = 'messageview.php' class="messages">
            <?php
                include 'messageview.php';
            ?>
            </div>
            <div class="message-input">
            <form method="POST" action = 'sendmessage.php'>
            <?php include 'sendmessage.php' ?> 
                <input name='message' type="text" placeholder="Scrivi un messaggio...">
                <button type="submit">Invia</button>
            </div>
        </div>
    </div>
</body>
</html>