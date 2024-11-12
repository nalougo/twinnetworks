<?php
session_start();
require('base.php');

$toutLesutilisateur = $bdd->query('SELECT * FROM userinfo');
$toutLeurInfo = $toutLesutilisateur->fetchAll();