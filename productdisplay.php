<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

//beroende på vad som valts i menyerna hämtas olika data från databasen
//kollas även mot ett regex för att undvika SQL injection
$regex = '/[a-z]/';
if (isset($_GET['belonging'])) {
    if (preg_match($regex, $_GET['belonging'])) {
        $belonging = $_GET['belonging'];
        $prod = 'Belonging = "' . $belonging . '"';
    }
}

if (isset($_GET['furniture'])) {
    if (preg_match($regex, $_GET['furniture'])) {
        $furniture = $_GET['furniture'];
        $prod = $prod . ' AND Furnituretype = "' . $furniture . '"';
    }
}

$q1 = "SELECT * FROM produkter WHERE " . $prod;
$res1 = mysql_query($q1);

echo '<div id="navigering">';
if (isset($belonging) and isset($furniture)) {
    echo '<h1>' . $belonging . '>' . $furniture . '</h1>';
} else {
    echo '<h1>' . $belonging . '</h1>';
}
echo '</div>';

echo '<div id="allavaror">';
while ($line = mysql_fetch_array($res1)) {
    $id = $line['ProductID'];

    echo '<div class="vara">';
    echo '<div class="varuutskrift">';
    
    echo '<img class="bild" src="Bilder/' . $line['ProductID'] . '.jpg">';
    
    echo '<div class="info">';
    echo $line['Productname'] . '<br>';
    echo $line['Sellprice'] . ' kr' . '<br>';
    echo $line['Information'] . '<br>';
    echo '</div>';
    echo '<div class="varuknappar">';
    echo "<a href='index.php?page=cart&action=add&id=$id'>Lägg till</a>" . "<a href='index.php?page=view_info&id=$id'>Info</a>" . '<br>' . '<br>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
mysql_close($conn);
?>