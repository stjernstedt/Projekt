<?php

if (!isset($noresults)) {
    
    $id = $line['ProductID'];
    
    echo '<div class="vara">';
    echo '<div class="varuutskrift">';
    echo '<div class="bild">';
    echo '<img src="Bilder/' . $line['ProductID'] . '.jpg">';
    echo '</div>';
    echo '<div id="info">';
    echo $line['Productname'] . '<br>';
    echo $line['Sellprice'] . ' kr' . '<br>';
    echo $line['Information'] . '<br>';
    echo '</div>';
    echo '<div class="varuknappar">';
    echo "<a href='index.php?page=cart&action=add&id=$id'>Lägg till</a>" . "<a href='index.php?page=view_info&id=$id'>Info</a>" . '<br>' . '<br>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
} else {
    echo 'Inga resultat!';
}

?>