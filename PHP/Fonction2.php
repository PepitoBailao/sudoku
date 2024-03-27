<?php 

    function tester_grille($une_grille){
        for ($cptl = 0; $cptl < TAILLE * TAILLE; $cptl++){
            for ($cptc = 0; $cptc < TAILLE * TAILLE; $cptc++){
                $val = $une_grille[$cptl][$cptc];
                $une_grille[$cptl][$cptc] = 0;
                if(!est_valide($une_grille, $cptl, $cptc, $val)){
                    return FALSE;
                }
                $une_grille[$cptl][$cptc] = $val;
            }        
        }
        return TRUE;
    }

    function transpose_tableau($un_tableau){
        $une_grille = array();
        $cpt = 0;
        for ($cptl = 0; $cptl < TAILLE * TAILLE; $cptl++){
            $une_grille[$cptl]=array();
            for ($cptc = 0; $cptc < TAILLE * TAILLE; $cptc++){
                $une_grille[$cptl][$cptc] = $un_tableau[$cpt];
                $cpt++;
            }
        }   
        return $une_grille;
    }
    
    
    function alea_vide(){
        if (mt_rand(1,100) < PROBA * 100 ){
            return true;
        }else{
            return false;
            }
    };

    function affiche_grille_html($une_grille){
        $max = TAILLE*TAILLE;
        echo "<h1>SUDOKU DE LA MORT QUI TUE</h1>";
        echo "<form action='index.php' method='post'>";
        echo "<table>";
        foreach ($une_grille as $une_ligne) {
            echo "<tr>";
            foreach ($une_ligne as $une_case) {
                echo "<td>";
                if(alea_vide()){
                    echo "<input type='number' name='tabVal[]' min='1' max='$max' size ='3'value='' required>";
                } else{
                    echo "<input type='number' name='tabVal[]' min='1' max='$max' size ='3'value='$une_case' readonly>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<input type='submit' value='Tester la validité'>";
        echo "</form>";
    };
?>
