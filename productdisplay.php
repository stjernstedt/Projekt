<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

//if (isset($_GET['belonging'])) {
//    switch ($_GET['belonging']) {
//        case 'arbetsrum' :
//            $belonging = 'Arbetsrum';
//            break;
//        case 'kök' :
//            $belonging = 'Kök';
//            break;
//        case 'sovrum' :
//            $belonging = 'Sovrum';
//            break;
//        case 'vardagsrum' :
//            $belonging = 'Vardagsrum';
//            break;
//    }
//}
//
//if (isset($_GET['furniture'])) {
//    switch ($_GET['furniture']) {
//        case 'belysning' :
//            $furniture = 'Belysning';
//            break;
//        case 'bord' :
//            $furniture = 'Bord';
//            break;
//        case 'fotölj' :
//            $furniture = 'Fotölj';
//            break;
//        case 'förvaring' :
//            $furniture = 'Förvaring';
//            break;
//        case 'soffa' :
//            $furniture = 'Soffa';
//            break;
//        case 'stol' :
//            $furniture = 'Stol';
//            break;
//        case 'säng' :
//            $furniture = 'Säng';
//            break;
//    }
//}
//if (isset($belonging) AND isset($furniture)) {
//    $prod = 'Belonging = "' . $belonging . '" AND Furnituretype = "' . $furniture . '"';
//} else {
//    if (isset($belonging)) {
//        $prod = 'Belonging = "' . $belonging . '"';
//    } else {
//        $prod = 'Furnituretype = "' . $furniture . '"';
//    }
//}

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