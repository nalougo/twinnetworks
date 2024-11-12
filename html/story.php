<?php require('../database/storyAction.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une photo et une vidéo</title>
    <link rel="stylesheet" href="../style/publie.css">
</head>
<body>

    <nav class="navbar">
        <span class="goback" onclick="goBack() ">&#8592;</span> 
        <a href="page3.php?id=<?= $_SESSION['id'];?>"><img src="./image/<?=$_SESSION['img'];?>"></a>
        <h1><?=$_SESSION['nom'];?> <?=$_SESSION['prenom'];?></h1>
    </nav>

    <div class="form-container">
        <!-- Formulaire pour publier une photo -->
        <div class="form-box">
            <h2>Publier une story</h2>
            <?php
              if(isset( $error)){
                echo '<p class="error">'.$error.'</p>';
              }elseif(isset($succes1)){
                echo '<p class="success">'.$succes1.'</p>';
              }
            ?>
            <form id="photoForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photoUpload">Télécharger une photo</label>
                    <input type="file" id="photoUpload" name="photo">
                    <img id="preview" src="#" alt="Aperçu de la photo" style="display:none;" />
                </div>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" id="title" placeholder="Entrez le titre" name="titre">
                </div>
                
                <button type="submit" class="btn" name="valider">Publier</button>
            </form>
        </div>

    <script>
        // Script pour prévisualiser l'image
        document.getElementById('photoUpload').onchange = function (event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        };
        function goBack() {
        window.history.back(); 
        }
    </script>
</body>
</html>