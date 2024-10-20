<?php

if (!isset($_SESSION['auth'])){
    header('Location: ../html/inscription.php');
}