<?php
require('photoAction.php');
require('base.php');
 // Assurez-vous que la session est bien démarrée

$errorMssg = '';

if (isset($_POST['valider'])) {
    // Vérification que les champs titre et description ne sont pas vides
    if (!empty($_POST['titre']) && !empty($_POST['description'])) {
        // Récupérer les données du formulaire
        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $question_date = date('d/m/Y');
        $heur = time();  // Correction : renommer "heur" en "heure" si nécessaire
        $question_id_author = $_SESSION['id'];
        $question_auto = $_SESSION['nom'];

        // Gestion de l'image téléchargée
        $img_nom = $_FILES['photo']['name'];
        $tmp_nom = $_FILES['photo']['tmp_name'];

        // Types d'images autorisés
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if ($_FILES['photo']['size'] > 1000000) {
            $errorMssg = "La taille du fichier est trop grande. Max 1 Mo.";
        } elseif (!in_array($_FILES['photo']['type'], $allowed_types)) {
            $errorMssg = "Seuls les formats JPEG, PNG et GIF sont acceptés.";
        } else {
            // Vérifier et créer le dossier si nécessaire
            if (!is_dir('image')) {
                mkdir('image', 0777, true);
            }

            // Déplacer l'image dans le dossier cible
            if (move_uploaded_file($tmp_nom, 'image/' . $img_nom)) {
                // Préparer et exécuter la requête pour insérer les données
                $inser = $bdd->prepare('INSERT INTO userinfo(titre, description, heure, date, auteur, img) 
                                        VALUES(:titre, :description, :heure, :date, :auteur, :img)');

                if ($inser->execute(array(
                    ':titre' => $titre,
                    ':description' => $description,
                    ':heure' => $heur,
                    ':date' => $question_date,
                    ':auteur' => $question_id_author,
                    ':img' => $img_nom
                ))) {
                    $errorMssg = 'Votre image a bien été publiée.';
                    // Redirection ou autres actions ici si nécessaire
                    header('Location: ../Html/verifier.php');  // Exemple de redirection
                    exit();
                } else {
                    $errorMssg = 'Erreur lors de l\'enregistrement des données utilisateur.';
                }
            } else {
                $errorMssg = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        $errorMssg = "Veuillez remplir tous les champs.";
    }
}
?>
