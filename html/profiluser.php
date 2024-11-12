<?php require ('../database/profiluserAction.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
      if(isset($trouve)){
    
    while($infouser = $Trouveiduser->fetch()){
      
            ?> 
            <img style="height: 50px;" src="./image/<?=$infouser['img'];?>">
            <h1><?=$infouser['nom'];?></h1>
            <p><?=$infouser['prenom'];?></p>
            <p><?=$infouser['it'];?></p>
            <p><?=$infouser['preffesion'];?></p>
            <p><?=$infouser['experience'];?></p>
            <a href="../database/messageAction.php?id=<?= $infouser['id']?>">message</a>
 
 
           <?php
 


        

    }
}elseif(isset($erreorMss)){
    echo $erreorMss;
}

    ?>
</body>
</html>