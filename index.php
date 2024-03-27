<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Ulysse RICHARD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUDOKU DE LA MORT QUI TUE</title>
    <link href="CSS/style.css" rel="stylesheet">
</head>
<body>
    <?php
    const TAILLE = 2;
    const PROBA = 0.4;
    require("PHP/Fonction1.php");
    require("PHP/Fonction2.php");

    if(!isset($_POST['tabVal'])){ //Début du jeu
        $grille = remplir_grille_ite();
        affiche_grille_html($grille);
    } else{ //Retour formulaire
        $grille = transpose_tableau($_POST['tabVal']);
        affiche_grille($grille);
        if (tester_grille($grille)){
            echo "Bravo";
        } else{
            echo "Grille non valide";
        }
    }
    ?>
</body>
</html>