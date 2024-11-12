<?php  
require('../database/connexionAction.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion au Compte</title>
    <link rel="stylesheet" href="../style/connexion.css">
</head>
<body>
    <div class="login-container" method ="post">
        <form class="login-form" method ="post">
            <h2>CONNEXION AU COMPTE</h2>
            <?php
            
            if(isset( $errorMssg)){
                echo '<p class="error">'.$errorMssg.'</p>';
            }
            ?>
            <label for="username">Nom d'utilisateur *</label>
            <input type="text" id="username" placeholder="Entrez votre nom d'utilisateur" name="nom">
            
            <label for="email">Entrez votre email</label>
            <input type="email" id="email" placeholder="Entrez votre email" name="email">

            <label for="password">Mot de passe *</label>
            <input type="password" id="password" placeholder="Entrez votre mot de passe" name="mdp">

            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn" name="valider">Connexion</button>

            <div class="links">
                <a href="inscription.php">Vous n'avez pas de compte ?</a>
                <!-- <a href="#">Mot de passe oublié ?</a> -->
            </div>
        </form>
    </div>
</body>
</html>
