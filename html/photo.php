<?php require ('../database/photoAction.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uploader une photo ou utiliser la caméra</title>
    <link rel="stylesheet" href="../style/photo.css" />
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <h1>Créer votre profil utilisateur (prenom)</h1>
        <div class="conteneur">
            <div class="img">
                <img src="" alt="Aperçu de l'image" name="img" /> 
            </div>
            <input type="file" name="photo" required>
            <input type="submit" name="upload" value="Upload Image">
        </div>
        <button type="submit" name="valider">Suivant</button>
    </form>
</body>
</html>
