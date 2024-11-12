<?php require ('../database/profiluserAction.php');?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/page3.css">
</head>

<body>
    <div class="profile-container">
        <header>
            <a href="#" class="back-btn">&#8592;</a>
            <h1>Profil utilisateur</h1>
            <a href="#" class="search-btn">&#128269;</a>
        </header>
    <section class="profile-info">
        <?php
        if (isset($trouve)){

            while($infouser = $Trouveiduser->fetch()){
                if($infouser['id'] == $_SESSION['id']){

                    ?>
            <div class="profile-header">
                <div class="profile-pic">
                    <span class="initial"><img src="./image/<?= $_SESSION['img'];?>" ></span>
                </div>
                <div class="profile-details">
                    <h2>votre profil</h2>
                    <p><?= $_SESSION['email'];?></p>
                    <p><span style=" font-weight: bold"><?= $_SESSION['nom'];?> <?= $_SESSION['prenom'];?></span></p>
                    <p>it:<span style=" font-weight: bold"><?= $_SESSION['it'];?></span></p>
                    <p>proffession: <span style=" font-weight: bold"><?= $_SESSION['profession'];?></span></p>
                    <p>Exeperience:<span style=" font-weight: bold"><?= $_SESSION['experience'];?></span></p>
                    <p><i class="fas fa-calendar-alt"></i> A rejoint TWIN_NETWORK en Décembre 2024</p>
                </div>
                <div class="edit-profile">
                <button><a href="./modifierProfil.php" style="text-decoration: none">Éditer le profil</a></button>
                </div>
            </div>
                    <?php
                }elseif($infouser['id'] != $_SESSION['id']){

                    ?>
                   <div class="profile-header">
                        <div class="profile-pic">
                            <span class="initial"><img src="./image/<?= $infouser['img'];?>" ></span>
                        </div>
                        <div class="profile-details">
                            <h2>Profil de <?=$infouser['nom'];?> <?=$infouser['prenom'];?></h2>
                            <p> <span style=" font-weight: bold"><?=$infouser['email'];?></span></p>
                            <p>it: <span style=" font-weight: bold"><?=$infouser['it'];?></span></p>
                            <p>Proffession:  <span style=" font-weight: bold"><?=$infouser['preffesion'];?></span></p>
                            <p>Experience: <span style=" font-weight: bold"><?=$infouser['experience'];?></span></p>
                            <p><i class="fas fa-calendar-alt"></i> A rejoint TWIN_NETWORK en Décembre 2024</p>
                        </div>
                        <div class="edit-profile">
                            <button><a href="./message.php?id=<?=$infouser['id'];?>" style="text-decoration: none">Envoyer un message</a></button>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        
        
        ?>
        
           

            <div class="profile-stats">
                <p>Nombres d'abonnés</p>
            </div>

            <div class="profile-posts">
                <table>
                    <thead>
                        <tr>
                            <th><a href="">Posts</a></th>
                            <th><a href="">Supprimer un post</a></th>
                            <th><a href="">Rajouter des posts</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>
