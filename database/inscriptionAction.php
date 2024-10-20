<?php
// Validation du formulaire 
require('base.php');
session_start();
// verifier si l'utilisateur a bien cliquer sur le bouton validation
if(isset($_POST['valider'])){

    if(!empty($_POST['nom']) &&
     !empty($_POST['prenom'] ) && 
     !empty($_POST['age']) && 
     !empty($_POST['email']) && 
     !empty($_POST['passion']) && 
     !empty($_POST['matricule']) && 
     !empty($_POST['it']) && 
     !empty($_POST['profession']) &&
     !empty($_POST['experience']) &&
     !empty($_POST['mdp'])
     
     ) {
      $user_nom = htmlspecialchars($_POST['nom']);
      $user_prenom = htmlspecialchars($_POST['prenom']);
      $user_age = htmlspecialchars($_POST['age']);
      $user_email = htmlspecialchars($_POST['email']);
      $user_passion = htmlspecialchars($_POST['passion']);
      $user_matricule = htmlspecialchars($_POST['matricule']);
      $user_it = htmlspecialchars($_POST['it']);
      $user_profession = htmlspecialchars($_POST['profession']);
      $user_experience = htmlspecialchars($_POST['experience']);
      $user_mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


      $_SESSION['nom'] =$user_nom;
      $_SESSION['prenom'] =$user_prenom;
      $_SESSION['age'] =$user_age;
      $_SESSION['email'] =$user_email;
      $_SESSION['passion'] =$user_passion;
      $_SESSION['matricule'] =$user_matricule;
      $_SESSION['it'] =$user_it;
      $_SESSION['profession'] =$user_profession;
      $_SESSION['experience'] =$user_experience;
      $_SESSION['mdp'] =$user_mdp;

     header('location: photo.php');
       
    }
}
?>