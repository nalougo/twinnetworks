<?php
$host = 'localhost'; 
$db = 'network2'; 
$user = 'root';  
$pass = '';  
$charset = 'utf8mb4';  

$base = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false, 
];

try {
   
    $bdd = new PDO($base, $user, $pass, $options);
    
  
} catch (PDOException $e) {
    
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>