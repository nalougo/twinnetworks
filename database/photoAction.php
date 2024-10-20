<?php
require('inscriptionAction.php');

$errorMssg = '';

if (isset($_POST['valider'])) {
    // Vérification que le fichier a bien été téléchargé
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        // Récupérer les informations de la photo
        $img_nom = $_FILES['photo']['name'];
        $tmp_nom = $_FILES['photo']['tmp_name'];

        // Vérifier la taille et le type du fichier
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

            // Déplacer l'image dans le dossier cible en conservant son nom d'origine
            if (move_uploaded_file($tmp_nom, 'image/' . $img_nom)) {
                // Connexion à la base de données
                require('base.php');

                // Préparer et exécuter la requête pour insérer les données
                $inser = $bdd->prepare('INSERT INTO userinfo(nom, prenom, age, email, passion, matricule, it, preffesion, experience, mdp, img) VALUES(:nom, :prenom, :age, :email, :passion, :matricule, :it, :profession, :experience, :mdp, :img)');

                if ($inser->execute(array(
                    ':nom' => $_SESSION['nom'],
                    ':prenom' => $_SESSION['prenom'],
                    ':age' => $_SESSION['age'],
                    ':email' => $_SESSION['email'],
                    ':passion' => $_SESSION['passion'],
                    ':matricule' => $_SESSION['matricule'],
                    ':it' => $_SESSION['it'],
                    ':profession' => $_SESSION['profession'],
                    ':experience' => $_SESSION['experience'],
                    ':mdp' => $_SESSION['mdp'],
                    ':img' => $img_nom
                ))) {
                    // Récupérer les informations de l'utilisateur inséré
                    $getInfoOfUsersreq = $bdd->prepare('SELECT * FROM userinfo WHERE email = ?');
                    $getInfoOfUsersreq->execute(array($_SESSION['email']));
                    $userInfo = $getInfoOfUsersreq->fetch();

                    $inserim= $bdd->prepare('INSERT INTO userimg( id,user_img) VALUES (?, ?)');
                    $inserim ->execute(array($userInfo['id'], $userInfo['img']));
                    $img= $inserim ->fetch();

                    // Vérifier si des données ont été retournées
                    if ($userInfo) {
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $userInfo['id'];
                        $_SESSION['nom'] = $userInfo['nom'];
                        $_SESSION['img_user'] = $img['user_img'];
                        // Rediriger vers la page de connexion
                        header('Location: ../Html/connexion.php');
                        exit();
                    } else {
                        $errorMssg = 'Erreur lors de la récupération des informations utilisateur.';
                    }
                } else {
                    $errorMssg = 'Erreur lors de l\'enregistrement des données utilisateur.';
                }
            } else {
                $errorMssg = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        $errorMssg = "Veuillez télécharger une photo valide.";
    }
}
?>
