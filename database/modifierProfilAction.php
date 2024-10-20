<?php
// Inclusion des fichiers nécessaires pour les actions liées aux photos
require('photoAction.php');

// Vérification si le formulaire a été soumis
if (isset($_POST['valider'])) {

    // Vérification si un fichier a été téléchargé sans erreur
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

        // Récupération des informations du fichier uploadé
        $img_nom = $_FILES['photo']['name'];
        $tmp_nom = $_FILES['photo']['tmp_name'];

        // Vérification de la taille et du type du fichier
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if ($_FILES['photo']['size'] > 1000000) {
            // Si le fichier est trop volumineux
            $errorMssg = "La taille du fichier est trop grande. Max 1 Mo.";
        } elseif (!in_array($_FILES['photo']['type'], $allowed_types)) {
            // Si le type du fichier n'est pas autorisé
            $errorMssg = "Seuls les formats JPEG, PNG et GIF sont acceptés.";
        } else {
            // Si le dossier 'image' n'existe pas, le créer
            if (!is_dir('image')) {
                mkdir('image', 0777, true);
            }

            // Déplacer le fichier uploadé dans le dossier 'image'
            if (move_uploaded_file($tmp_nom, 'image/' . $img_nom)) {
                // Si le fichier a été déplacé avec succès

                // Inclusion du fichier de connexion à la base de données
                require('base.php');

                // Récupération des autres données du formulaire et sécurisation avec htmlspecialchars
                $id = $_SESSION['id'];
                $nouveau_nom = htmlspecialchars($_POST['nom']);
                $nouveau_prenom = htmlspecialchars($_POST['prenom']);
                $nouveau_proffession = htmlspecialchars($_POST['proffession']);
                $nouveau_it = htmlspecialchars($_POST['it']);

                // Vérification de la connexion à la base de données et mise à jour des informations
                try {
                    // Préparation de la requête de mise à jour
                    $Changerprofil = $bdd->prepare('UPDATE userinfo SET nom=?, prenom=?, profession=?, it=? WHERE id = ?');
                    $Changerprofil->execute([$nouveau_nom, $nouveau_prenom, $nouveau_proffession, $nouveau_it, $id]);

                    // Vérification si des lignes ont été mises à jour
                    if ($Changerprofil->rowCount() > 0) {
                        echo "Les informations ont été mises à jour avec succès.";
                    } else {
                        echo "Aucune mise à jour effectuée.";
                    }

                    // Redirection vers la page home
                    header('Location: ../home.php');
                    exit(); // S'assurer que le script s'arrête après la redirection
                } catch (PDOException $e) {
                    // Gestion des erreurs SQL
                    echo "Erreur SQL : " . $e->getMessage();
                }
            } else {
                // Si le fichier n'a pas pu être déplacé
                $errorMssg = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        // Si aucun fichier n'a été téléchargé ou si une erreur est survenue
        $errorMssg = "Veuillez télécharger une photo valide.";
    }

    // Affichage des messages d'erreur éventuels
    if (isset($errorMssg)) {
        echo $errorMssg;
    }
}
?>
