<?php  
require('../database/affichierToutUtilisateurAction.php');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($tout as $user => $value) :?>

        <div class="user">
                <a href="profiluser.php?id=<?=$value['id']; ?>"><img style="height: 50px;" src="./image/<?=$value['img'];?>"></a>
                <h1><?=$value['nom'];?></h1>
                <form action=""method="post">
                    <button type="submit" name="acepter">accepter</button>
                </form>
                <br>
                <form action=""method="post">
                    <button type="submit" name="refuser">accepter</button>
                </form>
        </div>
    <?php endforeach;?>
      
   
</body>
</html>