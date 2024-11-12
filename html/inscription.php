<?php  
require('../database/inscriptionAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inscription.css"/>
    <title>Page3</title>
</head>
<body>
    <div class="form-container">
        <h2>Inscrivez-vous a Twin network</h2>
        <?php
        
        if(isset($errorMssg )){
            echo '<p class="error">'.$errorMssg.'</p>';
        }
        
        ?>
        <form method="post">
            <div class="left-column">
                <input type="text" placeholder="Nom" name="nom">
                <input type="text" placeholder="Prénom(s)" name="prenom">
                <input type="text" placeholder="Age" name="age">
                <input type="text" placeholder="Adresse mail Esatic" name="email">
                <input type="password" placeholder="Mot de passe" name="mdp">
               
            </div>
            <div class="right-column">
                <input type="text" placeholder="Matricule ESATIC" name="matricule">
                <input type="text" placeholder="N°IT" name="it">
                <input type="text" placeholder="Proffession" name="profession">
                <input type="text" placeholder="Expérience professionnel" name="experience">
                <input type="text" placeholder="Passion" name="passion">
                
            </div>
            <div class="submit-btn">
              
                <button type="submit" name="valider">Envoyer</button>
            </div>
        </form>
    </div>
    
</body>
</html>