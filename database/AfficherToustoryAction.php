<?php
require('base.php');

$toutstory = $bdd->query('SELECT * FROM story');
$story = $toutstory->fetchAll();
