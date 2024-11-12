<?php
session_start();
require('base.php');
if (isset($_GET['id']) && !empty($_GET['id'])){


    $id = $_GET['id'];
    $Trouveiduser = $bdd->prepare('SELECT * FROM userinfo WHERE id=?');
    $Trouveiduser->execute(array($id));
   if($Trouveiduser->rowCount()>0){
       $trouve =true;
   }else{
    $erreorMss ="Accun utilisateur trouvé";
   }
   
}else{
   $erreorMss ="Accun utilisateur trouvée";
}