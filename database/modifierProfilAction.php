<?php
session_start();
require('base.php');

if (isset($_POST['valider'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $proffession = htmlspecialchars($_POST['preffesion']);
    $it = htmlspecialchars($_POST['it']);

    if (!empty($_FILES['photo']['name'])) {
        $fileInfo = pathinfo($_FILES['photo']['name']);
        $extension = strtolower($fileInfo['extension']);
        
        // Extensions autorisées
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($extension, $allowedExtensions)) {
            // Générer un nom unique pour l'image
            $newFileName = uniqid() . '.' . $extension;
            $uploadDir = './image/';
            $uploadFile = $uploadDir . $newFileName;

            // Déplacer l'image téléchargée vers le dossier
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                // Requête SQL pour mettre à jour les informations de l'utilisateur
                $sql = 'UPDATE userinfo SET prenom = :prenom, nom = :nom, preffesion = :preffesion, it = :it, img = :img WHERE id = :id';
                $stmt = $bdd->prepare($sql);
                $stmt->execute([
                    ':prenom' => $prenom,
                    ':nom' => $nom,
                    ':preffesion' => $proffession,
                    ':it' => $it,
                    ':img' => $newFileName,
                    ':id' => $_SESSION['id'] // Supposant que l'ID de l'utilisateur est stocké dans la session
                ]);
                $succes1 = "Profil modifié avec succès";
            } else {
                $error = "Erreur lors du téléchargement de l'image.";
            }
        } else {
            $error = "Extension de fichier non autorisée.";
        }
    } else {
        $error = "Veuillez télécharger une image.";
    }
}
?>
