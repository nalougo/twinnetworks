<?php
session_start();
require('base.php');

if (isset($_POST['valider'])) {
    
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $date = date('Y-m-d H:i:s'); 
    $time =time();

  
    if (!empty($_FILES['photo']['name'])) {
        $fileInfo = pathinfo($_FILES['photo']['name']);
        $extension = strtolower($fileInfo['extension']);
        
       
        $newFileName = uniqid() . '.' . $extension;
        $uploadDir = './publie/';
        $uploadFile = $uploadDir . $newFileName;

        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
           
            $sql = 'INSERT INTO question (nom,prenom,titre, description, img, date ,auteur,heure) VALUES (:nom,:prenom,:titre, :description, :img, :date, :auteur, :heure)';
            $stmt = $bdd->prepare($sql);
            $stmt->execute([
                'nom' =>$_SESSION['nom'],
                'prenom' =>$_SESSION['prenom'],
                ':titre' => $titre,
                ':description' => $description,
                ':img' => $newFileName, 
                ':date' => $date,
                ':auteur' => $_SESSION['id'],
                ':heure' => $time,
            ]);
          $succes1 = "photo publiée avec succès"; 
        } else {
            $error = 'Erreur lors du téléchargement de l\'image.';
        }
    } else {
       $error ='Veuillez télécharger une image.';
    }
}

// if (isset($_POST['valide'])) {
  
//     $titre = htmlspecialchars($_POST['titre']);
//     $description = htmlspecialchars($_POST['description']);
//     $time = time() ;


//     if (!empty($_FILES['video']['name'])) {
//         $fileInfo = pathinfo($_FILES['video']['name']);
//         $extension = strtolower($fileInfo['extension']);
       
//         $allowedExtensions = ['mp4', 'avi', 'mov', 'mkv'];

//         if (in_array($extension, $allowedExtensions)) {
//             // Créer un nom unique pour la vidéo et définir son chemin
//             $newFileName = uniqid() . '.' . $extension;
//             $uploadDir = './videos/';
            
            
//             if (!is_dir($uploadDir)) {
//                 mkdir($uploadDir, 0777, true); 
//             }
            
//             $uploadFile = $uploadDir . $newFileName;

           
//             if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadFile)) {
               
//                 $sql = 'INSERT INTO videos (titre, description, video, heure) VALUES (:titre, :description, :video, :heure)';
//                 $stmt = $bdd->prepare($sql);
//                 $stmt->execute([
//                     ':titre' => $titre,
//                     ':description' => $description,
//                     ':video' => $newFileName, // Nom du fichier de la vidéo
//                     ':heure' => $time,
//                 ]);

//                $succes = "veideo envoyée avec sucess";
                
//             } else {
//                 $error2 ='Erreur lors du téléchargement de la vidéo.';
//             }
//         } else {
//             $error2 = 'Format de fichier non pris en charge. Seules les vidéos MP4, AVI, MOV, MKV sont autorisées.';
//         }
//     } else {
//          $error2 ='Veuillez télécharger une vidéo.';
//     }
// }
?>
