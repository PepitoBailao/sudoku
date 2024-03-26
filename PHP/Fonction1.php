<?php 
//Création d'un tableau (lignes et colonnes)
    function init_grille(){
        $grille = array();
        for ($cpt_ligne = 0; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne++){
            $grille[] = array();
            for ($cpt_colonne = 0; $cpt_colonne < TAILLE * TAILLE; $cpt_colonne++){
                $grille[$cpt_ligne][] = 0;
            }
        }
        return $grille;
    
    } 
//Fonction qui affiche une grille en 2 dimensions
//sous la forme d'une matrice
    function affiche_grille($grille){
        foreach ($grille as $ligne){
            foreach ($ligne as $elt){
                echo $elt . "&nbsp;" ;
            }
            echo "<br>";
        }
    }
//Fonction qui determine si la valeur peut etre placée dans le tableau selon les règles du SUDOKU
    function est_valide($une_grille, $ligne, $colonne, $elt){
        for($cpt_colonne = 0;$cpt_colonne < TAILLE * TAILLE; $cpt_colonne++){
            if ($une_grille[$ligne][$cpt_colonne] = $un_elt){
                return false
            }
        }
        for($cpt_ligne = 0;$cpt_ligne < TAILLE * TAILLE; $cpt_ligne++){
            if ($une_grille[$cpt_ligne][$cpt_colonne] = $un_elt){
                return false
            }
        }
        return true
    }




$une_grille = init_grille();
//echo ("<pre>");
//print_r($une_grille);
//echo ("</pre>");
affiche_grille($une_grille);
?>