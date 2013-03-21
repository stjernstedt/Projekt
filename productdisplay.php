<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

if (isset($_GET['belonging'])) {
    switch ($_GET['belonging']) {
        case 'arbetsrum' :
            $belonging = 'Arbetsrum';
            break;
        case 'kök' :
            $belonging = 'Kök';
            break;
        case 'sovrum' :
            $belonging = 'Sovrum';
            break;
        case 'vardagsrum' :
            $belonging = 'Vardagsrum';
            break;
    }
}

if (isset($_GET['furniture'])) {
    switch ($_GET['furniture']) {
        case 'belysning' :
            $furniture = 'Belysning';
            break;
        case 'bord' :
            $furniture = 'Bord';
            break;
        case 'fotölj' :
            $furniture = 'Fotölj';
            break;
        case 'förvaring' :
            $furniture = 'Förvaring';
            break;
        case 'soffa' :
            $furniture = 'Soffa';
            break;
        case 'stol' :
            $furniture = 'Stol';
            break;
        case 'säng' :
            $furniture = 'Säng';
            break;
    }
}

if (isset($belonging) AND isset($furniture)) {
    $prod = 'Belonging = "' . $belonging . '" AND Furnituretype = "' . $furniture.'"';
} else {
    if (isset($belonging)) {
        $prod = 'Belonging = "' . $belonging.'"';
    } else {
        $prod = 'Furnituretype = "' . $furniture.'"';
    }
}

$q1 = "SELECT * FROM produkter WHERE " . $prod;
$res1 = mysql_query($q1);
echo '<h1>'.$belonging .'>'. $furniture.'</h1>';
echo '<div id="allavaror">';
while ($line = mysql_fetch_array($res1)) {
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
    echo "<a href='cart.php?action=add&id=$id'>Add To Cart</a>" . "<a href='view_info.php?id=$id'> View info</a>" . '<br>' . '<br>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
}
echo '</div>';
mysql_close($conn);
?>