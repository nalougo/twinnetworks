<?php
require('base.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];

    // Vérifier si l'utilisateur existe
    $stmt = $bdd->prepare('SELECT * FROM userinfo WHERE id = ?');
    $stmt->execute([$getid]);

    if ($stmt->rowCount() > 0) {
        // L'utilisateur existe
        if (isset($_POST['envoi']) && !empty($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);

            // Insertion du message
            $stmt = $bdd->prepare('INSERT INTO message1 (message, id_destinataire, id_auteur) VALUES (?, ?, ?)');
            $stmt->execute([$message, $getid, $_SESSION['id']]);
        } 

        // Récupérer et afficher les messages
        $stmt = $bdd->prepare('SELECT * FROM message1 WHERE id_destinataire = ? AND id_auteur = ? OR id_destinataire = ? AND id_auteur = ?  ');
        $stmt->execute([$_SESSION['id'],$getid,$getid,$_SESSION['id']]);
        $recupererimg = $bdd->prepare('SELECT * FROM userinfo WHERE id = ?');
        $recupererimg ->execute(array($getid));
   
       
       
    } else {
        echo "Aucun utilisateur trouvé avec cet ID.";
    }
} else {
    echo "Aucun utilisateur ne possède cet ID.";
}
