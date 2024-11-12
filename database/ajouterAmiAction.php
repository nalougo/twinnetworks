<?php

require('base.php');

if(isset($_GET['id'])){

    $id_ami = $_GET['id'];
    $id_co = $_SESSION['id'];
    
    // $Ajouter = $bdd ->prepare('INSERT INTO ami(id_ami, id_co) VALUES (?, ?)');
    // $Ajouter->execute(array($id_ami, $id_co));

    $ami = $bdd->prepare('SELECT * FROM userinfo WHERE id=? ');
    $ami->execute(array($id_ami));
   

    $con = $bdd->prepare('SELECT * FROM userinfo WHERE id=?');
    $con->execute(array($id_co));
    $connecter = $con->fetch();
    
    $Ajouter = true ;  
}