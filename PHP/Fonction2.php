<?php
function affiche_grille_html($grille) {
    echo "<form method='post' action='index.php'>";
    echo "<table>";
    foreach ($grille as $ligne) {
        echo "<tr>";
        foreach ($ligne as $cellule) {
            echo "<td><input type='number' min='1' max='9' value='" . $cellule . "'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<button type='submit'>Tester la validité</button>";
    echo "</form>";
}
?>

