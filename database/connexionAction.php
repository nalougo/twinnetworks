<?php
require('base.php');
 session_start();

if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        // Récupérer les données des utilisateurs
        $user_nom = htmlspecialchars($_POST['nom']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['mdp']);

        // Vérifier si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM userinfo WHERE nom =? AND email =?');
        $checkIfUserExists->execute(array( $user_nom, $user_email));

        if ($checkIfUserExists->rowCount() > 0) {
            $userInfos = $checkIfUserExists->fetch();
     
            if (password_verify($user_password, $userInfos['mdp'])) {
                var_dump($_SESSION);
                // Démarrer une session utilisateur
                $_SESSION['auth']=true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['nom'] = $userInfos['nom'];
                $_SESSION['prenom'] = $userInfos['prenom'];
                $_SESSION['email'] = $userInfos['email'];
                $_SESSION['img'] = $userInfos['img']; 
                $_SESSION['it'] = $userInfos['it'];
                $_SESSION['profession'] = $userInfos['profession'];
                $_SESSION['experience'] = $userInfos['experience'];
                
                // Redirection vers la page d'accueil
                header('Location: ../home.php');
             
            } else {
                $errorMssg = "Votre mot de passe est incorrect.";
            }   
          
           
       
        } else {
            $errorMssg = "Votre email est incorrect.";
        }
    } else {
        $errorMssg = "Veuillez remplir tous les champs.";
    }
}
?>
