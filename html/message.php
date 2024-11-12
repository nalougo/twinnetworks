<?php
session_start();
require('../database/messageAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="../style/message.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #075E54;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .recipient-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 80vh;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }
        .messages {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
        }
        .message {
            padding: 10px;
            margin: 5px 0;
            border-radius: 15px;
            max-width: 60%;
            word-wrap: break-word;
        }
        .sent {
            background-color: #DCF8C6;
            margin-left: auto;
            text-align: right;
        }
        .received {
            background-color: #FFFFFF;
            margin-right: auto;
            text-align: left;
            border: 1px solid #ddd;
        }
        .message-input-container {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
            background-color: #f7f7f7;
        }
        textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }
        button {
            padding: 10px;
            margin-left: 10px;
            background-color: #25D366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1b9e4b;
        }
        .go-back {
            background: color #1b9e4b; 
            margin-right: 10px;
            cursor: pointer;
            color: white;
            font-size: 1.2rem; /* Ajuster la taille de l'icône si nécessaire */
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="go-back" onclick="goBack()">
        <i class="uil uil-arrow-left">Retour</i> <!-- Icône de retour -->
    </div>
    <?php
    while($destinateur = $recupererimg->fetch()){
        ?>
        <img src="../html/image/<?=$destinateur['img'];?>" class="recipient-photo">
        <p class="recipient-name"><?=$destinateur['nom'];?></p>
        <?php
    }
    ?>
</div>

<br>
<div class="chat-container">
    <div class="messages" id="messageArea">

    <?php
    while($recuperer = $stmt->fetch()){
        if($recuperer['id_destinataire']== $_SESSION['id']){
            ?>
            <div class="message received" ><?=$recuperer['message'];?></div>
            <?php
        }elseif($recuperer['id_destinataire']== $getid){
            ?>
            <div class="message sent" ><?=$recuperer['message'];?></div>
            <?php
        }
    }
    ?>

    </div>

   <form action="" method="post">
        <div class="message-input-container">
            <textarea id="messageInput" name="message" placeholder="Écrire un message..." rows="3"></textarea>
            <button type="submit" name="envoi">Envoyer</button>
        </div>
    </form>
</div>
<br>

<script>
    function goBack() {
        window.history.back(); 
    }
</script>
<script>
        function loadPageContent() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "message.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    
                    document.getElementById("main-content").innerHTML = this.responseText;
                }
            }
            xhr.send();
        }
        setInterval(loadPageContent, 10000);  
        // loadPageContent();
    </script>
</body>
</html>
