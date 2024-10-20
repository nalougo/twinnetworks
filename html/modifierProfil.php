<?php
require('../database/modifierProfilAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil</title>
    <link rel="stylesheet" href="../style/modifierProfil.css">
</head>
<body>
       <form class="profile-form" method="post">
            <div class="profile-container">
                <h2>Modifier le Profil</h2>
                
                <!-- Photo de profil -->
                <div class="profile-photo">
                    <img id="profileImage" src="OIP.jpeg" alt="Photo de profil">
                    <label for="profilePhotoUpload" class="upload-button" >Changer la photo</label>
                    <input type="file" id="profilePhotoUpload" accept="image/*" onchange="previewImage(event)" name="photo">
                </div>


         








                <!-- Formulaire de modification des informations -->
            
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" name="prenom" >
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" name="nom" >
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession :</label>
                        <input type="text" id="profession" name="proffession" placeholder="Entrez votre profession" name="prenom">
                    </div>
                    <div class="form-group">
                        <label for="id">Identifiant (ID) :</label>
                        <input type="text" id="id" name="id" placeholder="Entrez votre ID" name="it" >
                    </div>
                    <button type="submit" class="save-button" name="valider">Enregistrer les modifications</button>
        </form>
    </div>

    <script>
        // Prévisualisation de l'image de profil
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
