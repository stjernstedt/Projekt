<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php

if (!isset($noresults)) {
    
    $id = $line['ProductID'];
    
    echo '<div class="vara">';
    echo '<div class="varuutskrift">';
    echo '<img class="bild" src="Bilder/' . $line['ProductID'] . '.jpg">';
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