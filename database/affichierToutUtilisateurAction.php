<?php
require('photoAction.php');
require('base.php');


$RecupereToutuser = $bdd->prepare('SELECT * FROM userinfo');
$RecupereToutuser ->execute();
$tout = $RecupereToutuser->fetchAll();







