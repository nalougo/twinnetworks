<?php
session_start();
 require('./database/security.php');
require('./database/AfichierPublicationAction.php');
require('./database/AfficherToustoryAction.php');
require('./database/ajouterAmiAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le réseautage des twiners</title>
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<nav>
    <div class="container">
        <h2 class="logo">
            twiner social
        </h2>
        <div class="search-bar">
            <i class="uil uil-search"></i>
            <input type="search" placeholder="Recherche">
        </div>
        <div class="create">
            <label class="btn btn-primary" for="create-post"> 
                <a href="./html/modifierProfil.php">Modifier</a>
            </label>
            <div class="profile-photo">
                <img src="./html/image/<?=$_SESSION['img'];?>" alt="">
            </div>
            <!-- Ajout du lien de déconnexion -->
            <a href="./database/logout.php" class="btn btn-secondary">Déconnexion</a>
        </div>
    </div>
</nav>


    <!-------------------------------- principale ----------------------------------->
    <main>
        <div class="container">
            <!----------------- gauche -------------------->
            <div class="left">
                <a href="./html/page3.php?id=<?=$_SESSION['id'];?>">
                    <div class="profile-photo">
                    <img src="./html/image/<?=$_SESSION['img'];?>">
                    </div>
                    <div class="handle">
                        <h4><?=$_SESSION['nom'];?></h4>
                        <p class="text-muted">
                            @<?=$_SESSION['prenom'];?>
                        </p>
                    </div>
                </a>

                <!----------------- Table de navigation-------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>   
                    </a>
                    <a class="menu-item" href="./html/ajouterAmi.php">
                        <span><i class="uil uil-compass"></i></span>
                        <h3>Explore</h3>
                    </a>
                    <a class="menu-item"  id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
                        <h3>Notification</h3>
                        <!--------------- NOTIFICATION  --------------->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-2.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Keke Benjamin</b> accepted your friend request
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-3.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>John Doe</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-4.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Marry Oppong</b> and <b>283 Others</b> liked your post
                                    <small class="text-muted">4 Minutes Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-5.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Doris Y. Lartey</b> commented on a post you are tagged in
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-6.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Keyley Jenner</b> commented on a post you are tagged in
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-7.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Jane Doe</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                        </div>
                        <!--------------- Fin de notification --------------->
                    </a>
                    <a class="menu-item" id="messages-notifications">
                        <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
                        <h3>Messages</h3>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                </div>
                <!----------------- Fin de la bar -------------------->
                <label class="btn btn-primary" for="create-post"><a href="./html/publie.php">Publier</a></label>
            </div>

            <!----------------- Milieu -------------------->
            <div class="middle">
                 <!----------------- Les stories -------------------->
                <div class="stories">
                    <?php foreach ($story  as $user => $value) :?>

                       <?php
                        if($_SESSION['id']==$value['id']){
                            ?>
                        <div class="story">
                          <img src="./html/story/<?=$value['img'];?>">
                            <div class="profile-photo">
                                <img src="./html/image/<?=$_SESSION['img'];?>">
                            </div>
                            <p class="name">Your Story</p>
                        </div>
                            <?php

                        }elseif($_SESSION['id']!=$value['id']){
                            $autre = $bdd->prepare('SELECT * FROM userinfo WHERE id=?');
                            $autre->execute(array($value['id_auteur']));
                            $Saphoto = $autre->fetch();

                            ?>
                                <div class="story">
                                       <img src="./html/story/<?=$value['img'];?>">
                                        <div class="profile-photo">
                                            <img src="./html/image/<?=$Saphoto['img'];?>">
                                        </div>
                                        <p class="name"><?=$value['nom'];?></p>
                                </div>
                            <?php

                        }
                        
                        ?>
                    <?php endforeach;?>
                </div>
                <!----------------- fin de stories -------------------->
                <form action="" class="create-post">
                    <div class="profile-photo">
                    <img src="./html/image/<?=$_SESSION['img'];?>" alt="">
                    </div>
                    <input type="text" placeholder="Quelle est votre pensée?" id="Publier">
                    <a href="./html/story.php"><input  value="story" class="btn btn-primary"></a>
                </form>
                
                <div class="feeds">
                    <div class="feed">
                    <!-- On affiche tout les publication  -->
                    <?php foreach ($resultat  as $user => $value) :?>
                      <?php
                        if($_SESSION['id'] == $value['auteur']){

                          ?>
                        <div class="head">
                                <div class="user">
                                    <div class="profile-photo">
                                        <img src="./html/image/<?=$_SESSION['img'];?>">
                                    </div>
                                    <div class="info">
                                         <h3><a href="./html/page3.php?id=<?=$_SESSION['id']?>"><?=$_SESSION['nom'];?></a></h3>
                                        <small>publié le <?=$value['date'];?> à <?=$value['heure'];?></small>
                                        <p><?=$value['titre'];?></p>
                                         <p><?=$value['description'];?></p>
                                        
                                    </div>
                                </div>
                                <span class="edit">
                                    <i class="uil uil-ellipsis-h"></i>
                                </span>
                            </div>
                            <div class="photo">
                                <img src="./html/publie/<?= $value['img'];?>">
                            </div>
                            <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span  ><i class="uil uil-share-alt" onclick="shareContent()"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./images/profile-10.jpg"></span>
                            <span><img src="./images/profile-4.jpg"></span>
                            <span><img src="./images/profile-15.jpg"></span>
                            <p>Liked by <b>Ernest Achiever</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Lana Rose</b> Lorem ipsum dolor sit quisquam eius. 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 277 comments
                        </div>
                          <?php
                        }elseif($_SESSION['id'] !=$value['auteur']){
                           $trouvele = $bdd->prepare('SELECT * FROM userinfo WHERE id=?');
                           $trouvele->execute(array($value['auteur']));
                           $Tresbon = $trouvele->fetch();
                           ?>

                            <div class="head">
                                <div class="user">
                                    <div class="profile-photo">
                                        <img src="./html/image/<?=$Tresbon['img'];?>">
                                    </div>
                                    <div class="info">
                                         <h3><a href="./html/page3.php?id=<?=$Tresbon['id']?>"><?=$Tresbon['nom'];?></a></h3>
                                        <small>publié le <?=$value['date'];?> à <?=$value['heure'];?></small>
                                        <p><?=$value['titre'];?></p>
                                         <p><?=$value['description'];?></p>
                                        
                                    </div>
                                </div>
                                <span class="edit">
                                    <i class="uil uil-ellipsis-h"></i>
                                </span>
                            </div>
                            <div class="photo">
                                <img src="./html/publie/<?= $value['img'];?>">
                                
                            </div>
                            <div class="action-buttons">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span  ><i class="uil uil-share-alt" onclick="shareContent()"></i></span>
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./images/profile-10.jpg"></span>
                            <span><img src="./images/profile-4.jpg"></span>
                            <span><img src="./images/profile-15.jpg"></span>
                            <p>Liked by <b>Ernest Achiever</b> and <b>2, 323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Lana Rose</b> Lorem ipsum dolor sit quisquam eius. 
                            <span class="harsh-tag">#lifestyle</span></p>
                        </div>

                        <div class="comments text-muted">
                            View all 277 comments
                        </div>
                           <?php
                        }
                        ?>
                            

                    <?php endforeach;?>  

                         <script>

                            function shareContent() {
                                if (navigator.share) {
                                navigator.share({
                                    title: 'Titre du contenu',
                                    text: 'Regarde ce contenu intéressant !',
                                    url: 'https://tonsite.com'
                                }).then(() => {
                                    console.log('Le contenu a été partagé avec succès.');
                                }).catch((error) => {
                                    console.error('Erreur lors du partage', error);
                                });
                                } else {
                                alert('Le partage n\'est pas supporté sur ce navigateur.');
                                }
                            }
                         </script>
                    </div>            
                </div>
                <!----------------- Fin des publication -------------------->
            </div>
             <!----------------- Fin du milieu -------------------->

            <!----------------- Coté droite -------------------->
            <div class="right">
                <!------- Message ------->
                <div class="messages">
                    <div class="heading">
                        <h4>Messages</h4>
                        <i class="uil uil-edit"></i>
                    </div>
                    <!------- Recherche ------->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search messages" id="message-search">
                    </div>
                    <!------- MESSAGES CATEGORY ------->
                    <div class="category">
                        <h6 class="active">Primary</h6>
                        <h6>General</h6>
                        <h6 class="message-requests">Requests (7)</h6>
                    </div>
                    <!------- MESSAGES ------->
                    <?php
                        require('./database/base.php');
                        
                        $messageTout = $bdd->query('SELECT * FROM userinfo');
                        while($message=$messageTout->fetch()){
                            if($message['id'] != $_SESSION['id']){

                                ?>
                                <div class="message">
                                    <div class="profile-photo">
                                    <img src="./html/image/<?=$message['img'];?>">
                                    </div>
                                    <div class="message-body">
                                    <a href="./html/message.php?id=<?=$message['id'];?>"><h4><?=$message['nom'];?></h4></a>
                                        <p class="text-muted">il y'a 1 min</p>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                    ?>
                    
                    
                </div>
                <!------- fin de message ------->

                <!------- les invitation------->
                <div class="friend-requests">
                    <h4>Invitation</h4>
                    <?php
                    if(isset($Ajouter)){
                        require('./database/ajouterAmiAction.php');
                        while($conuser = $ami->fetch()){
                            if( $_SESSION['id']!=$conuser['id'] ){
                                ?>
                        <div class="request">
                            <div class="info">
                                <div class="profile-photo">
                                <img src="./html/image/<?=$conuser['img'];?>">
                                </div>
                                <div>
                                    <h5><?=$conuser['nom'];?></h5>
                                    <p class="text-muted"><?=$conuser['prenom'];?></p>
                                </div>
                            </div>
                            <div class="action">
                                <button class="btn btn-primary">
                                    Accept
                                </button>
                                <button class="btn">
                                    Decline
                                </button>
                        </div>

                                <?php

                            }
                        }
                    }
                    ?>
                    
                   
                </div>
            </div>
            <!----------------- END OF RIGHT -------------------->
        </div>
    </main>

    <!----------------- THEME CUSTOMIZATION -------------------->
    <div class="customize-theme">
        <div class="card">
            <h2>Customize your view</h2>
            <p class="text-muted">Manage your font size, color, and background</p>

            <!----------- FONT SIZE ----------->
            <div class="font-size">
                <h4>Font Size</h4>
                <div>
                    <h6>Aa</h6>
                    <div class="choose-size">
                        <span class="font-size-1"></span>
                        <span class="font-size-2 active"></span>
                        <span class="font-size-3"></span>
                        <span class="font-size-4"></span>
                        <span class="font-size-5"></span>
                    </div>
                    <h3>Aa</h3>
                </div>
            </div>

            <!----------- PRIMARY COLORS ----------->
            <div class="color">
                <h4>Color</h4>
                <div class="choose-color">
                    <span class="color-1 active"></span>
                    <span class="color-2"></span>
                    <span class="color-3"></span>
                    <span class="color-4"></span>
                    <span class="color-5"></span>
                </div>
            </div>

            <!----------- BACKGROUND COLORS ----------->
            <div class="background">
                <h4>Background</h4>
                <div class="choose-bg">
                    <div class="bg-1 active">
                        <span></span>
                        <h5 for="bg-1">Light</h5>
                    </div>
                    <div class="bg-2">
                        <span></span>
                        <h5 for="bg-2">Dim</h5>
                    </div>
                    <div class="bg-3">
                        <span></span>
                        <h5 for="bg-3">Dark</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Rendre la page dynamique -->

  <script>
        function loadPageContent() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "home.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    
                    document.getElementById("main-content").innerHTML = this.responseText;
                }
            }
            xhr.send();
        }
        setInterval(loadPageContent, 10000);  
         //loadPageContent();
    </script>
    <script src="./index.js"></script>

</body>
</html>