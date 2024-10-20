<?php 
require ('../database/verifierAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> verifier</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
  <div class="container">
    
    <h2>matricule</h2>
    
    <form method="post">
       

          <label for="parrain">matricule (ESATIC)</label>
          <input type="text" id="parrain" name="matri">
       
          <button type="submit" name="valider">Envoi</button>
    </form>
    <br></br>
    <?php 
          
          if(isset($errorMssg)){
            echo '<p class="error">'.$errorMssg.'</p>';
          }elseif(isset($succesMssg)){

            ?>
             <div class="input">
             <a href="inscription.php" id="input">Se conecter our la première fois</a> <br>
             <a href="connexion.php" id="input">Se conecter</a> 
            </div>
            <?php
          }
          ?>
  </div>
</body>
</html>

