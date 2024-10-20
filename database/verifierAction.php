<?php
require('base.php');
 session_start();

if (isset($_POST['valider'])) {
    if (!empty($_POST['matri'])) {
        // Récupérer les données des utilisateurs
        $user_matri = htmlspecialchars($_POST['matri']);


        // Vérifier si l'utilisateur existe
        $checkIfUsermatri = $bdd->prepare('SELECT * FROM matricule WHERE matri = ?');
        $checkIfUsermatri->execute(array($user_matri));

        if ($checkIfUsermatri->rowCount() > 0) {
            $userInfos = $checkIfUsermatri->fetch();
            $succesMssg= "vous vraiment un twiner ";
             
           
        } else {
            $errorMssg = "Votre matricule ne correspond pas a un matricule d'un twiner.";
        }
    } else {
        $errorMssg = "Veuillez remplir le champs.";
    }
}
?>
