
<?php require ('../database/modifierProfilAction.php');?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil</title>
    <link rel="stylesheet" href="../style/modifierProfil.css">
</head>
<body>
       <form class="profile-form" method="post" enctype="multipart/form-data">
            <div class="profile-container">
                <h2>Modifier le Profil</h2>
                <?php 
                if (isset($error)){
                    echo '<p style="color:red;">'.$error.'</p>';
                }elseif(isset($succes1)){
                    echo '<p style="color:green;">'.$succes1.'</p>';
                }
                ?>
                <!-- Photo de profil -->
                <div class="profile-photo">
                    <img id="profileImage" src="OIP.jpeg" alt="Photo de profil">
                    <label for="profilePhotoUpload" class="upload-button" >Changer la photo</label>
                    <input type="file" name="photo" onchange="previewImage(event)">
                </div>
                <!-- Formulaire de modification des informations -->
            
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom">
                </div>
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="profession">Profession :</label>
                    <input type="text" id="profession" name="preffesion" placeholder="Entrez votre profession">
                </div>
                <div class="form-group">
                    <label for="id">Identifiant (ID) :</label>
                    <input type="text" id="id" placeholder="Entrez votre ID" name="it">
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
