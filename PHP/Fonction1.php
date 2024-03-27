<?php
// Crée une grille TAILLE² lignes et TAILLE² colonnes de 0
    function init_grille (){
        $une_grille = array ();
        for ( $cpt_ligne = 0 ; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne ++){
            $une_grille [] = array ();
            for ( $cpt_colonne = 0 ; $cpt_colonne < TAILLE * TAILLE; $cpt_colonne ++){
                $une_grille [ $cpt_ligne ][] = 0 ;
            }
        }
        return $une_grille ;
    }


// Crée une fonction qui affiche une grille de 2 dimension sous la forme d'une matrice
    function affiche_grille ( $une_grille ){
        foreach ( $une_grille as $une_ligne ){
            foreach ( $une_ligne as $un_elt ){
                echo $un_elt . "&nbsp;" ;
                }
                echo "<br>" ;
            }
        }

// fonction qui détermine si une valeur peut être classé dans un tableau à un emplacement donné
// selon les règles du sudoku
    function est_valide ( $une_grille , $une_ligne , $une_colonne , $un_elt ){
// teste la présence d'un élément dans la ligne
        for ( $cpt_colonne = 0 ; $cpt_colonne < TAILLE * TAILLE; $cpt_colonne ++){
            if ( $une_grille [ $une_ligne ][ $cpt_colonne ] == $un_elt ){
                return FALSE ;
            }
        }

// teste la présence d'un élément dans la colonne
        for ( $cpt_ligne = 0 ; $cpt_ligne < TAILLE * TAILLE; $cpt_ligne ++){
            if ( $une_grille [ $cpt_ligne ][ $une_colonne ] == $un_elt ){
                return FALSE ;
            }
        }

// test la présence d'un élément dans la région
    $deb_ligne_region = $une_ligne - $une_ligne % TAILLE;
    $deb_col_region = $une_colonne - $une_colonne % TAILLE;
        for ( $cpt_l = 0 ; $cpt_l < TAILLE; $cpt_l ++){
            for ( $cpt_c = 0 ; $cpt_c < TAILLE; $cpt_c ++){
                if ( $une_grille [ $deb_ligne_region + $cpt_l ][ $deb_col_region + $cpt_c ] == $un_elt ){
                    return FALSE ;
                }
            }
        }
        return TRUE ;
    }

//Fonction de debogage
//Test1
    function test_exemples() {
        $grille = init_grille ();
        affiche_grille ($grille);
        $res = est_valide($grille, 0, 0, 1);
        echo "1 ligne 0 colonne 0";
        if($res){
            echo " est possible<br>";
        }else{
            echo " impossible<br>";
        
        }
    $grille[0] = [1,3,4,2];
    $grille[1] = [2,3,0,0];
    affiche_grille($grille);
    $res = est_valide($grille, 1,2,4);
    echo "4 ligne 1 colonne 2";
        if($res){
            echo " est possible<br>";
        }else{
            echo " impossible<br>";
        }
    $grille[0] = [1,4,3,2];
    $grille[1] = [2,3,4,1];
    $grille[2] = [4,1,2,0];
    affiche_grille($grille);
    $res = est_valide($grille, 2,3,1);
    echo "1 ligne 2 colonne 3";
        if($res){
            echo " est possible<br>";
        }else{
            echo " impossible<br>";
        }
    }

//Fonction pour remplir la grille
    function remplir_grille(){
        $une_grille = init_grille();
        $tab_val = array();
        for ( $cpt = 1; $cpt <= TAILLE * TAILLE; $cpt++){
            $tab_val[]=$cpt;
        }
        for($cpt_l = 0; $cpt_l < TAILLE * TAILLE; $cpt_l++){
            for ($cpt_c = 0 ; $cpt_c < TAILLE * TAILLE; $cpt_c ++){
                shuffle($tab_val);
                $cpt = 0;
                $res = est_valide($une_grille, $cpt_l, $cpt_c, $tab_val[$cpt]);
                while(!$res){
                    $cpt++;
                    if ($cpt == TAILLE*TAILLE){
                        return $une_grille;
                    }
                    $res = est_valide($une_grille, $cpt_l, $cpt_c, $tab_val[$cpt]);
                }
                $une_grille[$cpt_l][$cpt_c] = $tab_val[$cpt];


            }
        }
        return $une_grille;
    }

    function remplir_grille_ite(){
        $une_grille = remplir_grille();
        while($une_grille[TAILLE * TAILLE -1][TAILLE * TAILLE -1] == 0){
            $une_grille = remplir_grille();
        }
        return $une_grille;
    }
?>