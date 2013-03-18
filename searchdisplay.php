<?php

if (!isset($noresults)) {
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
    echo "<a href='cart.php?action=add&id=$id'>Add To Cart</a>" . "<a href='view_info.php?id=$id'> View info</a>" . '<br>' . '<br>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo 'Inga resultat!';
}

?>