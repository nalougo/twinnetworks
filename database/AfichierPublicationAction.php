<?php
require('base.php');

$recuprerToutPublication = $bdd->query('SELECT * FROM question');
$resultat = $recuprerToutPublication->fetchAll();






