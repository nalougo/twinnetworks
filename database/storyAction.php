<?php
session_start();
require('base.php');

if (isset($_POST['valider'])) {
    
    $titre = htmlspecialchars($_POST['titre']);
    if (!empty($_FILES['photo']['name'])) {
        $fileInfo = pathinfo($_FILES['photo']['name']);
        $extension = strtolower($fileInfo['extension']);
        
       
        $newFileName = uniqid() . '.' . $extension;
        $uploadDir = './story/';
        $uploadFile = $uploadDir . $newFileName;

        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
           
            $sql = 'INSERT INTO story (nom,prenom,id_auteur,img ,titre) VALUES (?,?,?,?,?)';
            $stmt = $bdd->prepare($sql);
            $stmt->execute([
                 $_SESSION['nom'],
                 $_SESSION['prenom'],
                 $_SESSION['id'],
                 $newFileName,
                 $titre,  
            ]);
          $succes1 = "photo publiée avec succès"; 
        } else {
            $error = 'Erreur lors du téléchargement de l\'image.';
        }
    } else {
       $error ='Veuillez télécharger une image.';
    }
}