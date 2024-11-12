<?php  
require('../database/ajouterAmi2Action.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'Utilisateurs</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/ajouterAmi.css">
</head>
<body>
    <div class="header">
        <h1>Liste des étudiants twiners</h1>
    </div>
    <div class="users-list-container">
        <?php foreach ($toutLeurInfo  as $user => $value) :?>
           <?php
            if($_SESSION['id'] != $value['id']){
                ?>
                <div class="user-card">
                        <div class="user-pic">
                        <img src="./image/<?=$value['img'];?>">
                        </div>
                        <div class="user-info">
                            <p class="user-name"><a href="page3.php?id=<?=$value['id'];?>"><?=$value['nom'];?> <?=$value['prenom'];?></a></p>
                      
                            <a class="add-friend-btn" href="../home.php?id=<?=$value['id'];?>">Ajouter</a>
                       
                        </div>
                </div>
            
                <?php
            }
            
            ?>
        <?php endforeach;?>
    </div>
</body>
</html>
