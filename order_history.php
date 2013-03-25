<?php

if (!isset($_SESSION)) {
    session_start();
}

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

$user = $_SESSION['user'];


$q1 = "SELECT * FROM ordrar WHERE UserID = '$user'";
$res1 = mysql_query($q1) or die(mysql_error());

//om specifik order ej har valts skrivs hela orderlistan ut
if (!isset($_GET['fetchorder'])) {
    echo '<h1 id="orderh">Din orderhistorik</h1>';
    echo '<div id="orderhistorik">';
    echo '<div id="productstableheader"><text class="left">Datum</text><text class="right">Ordernummer</text></div><br>';

    echo '<div id="productstable">';
    while ($line = mysql_fetch_array($res1)) {
        echo '<div class="productrow">';
        echo '<text class="left">' . $line['Date'] . '</text><a href="index.php?page=order_history&fetchorder=' . $line['OrderID'] . '">' . $line['OrderID'] . '</a>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
} else {
    fetchOrder($res1, $_GET['fetchorder']);
}

//funktion som hämtar lagrad kundvagn och skriver ut den
function fetchOrder($resource, $order) {

    while ($line = mysql_fetch_array($resource)) {
        if ($line['OrderID'] == $order) {
            $temp = $line['Products'];
        }
    }

//  gör om strängen som kundvagnen är lagrad som till en array
    $cart = unserialize($temp);
    echo '<h1 id="dinorder">Din order</h1>';
    echo '<div id="orderhistorik">';
    echo '<div id="productstableheader"><text class="left">Produkt</text><text class="center">Antal</text><text class="right">Pris</text></div><br>';
    echo '<div id="productstable">';
    foreach ($cart as $ProductID => $quantity) {

        $sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;", $ProductID);

        $result = mysql_query($sql);

        while ($line = mysql_fetch_array($result)) {

            echo '<div class="productrow">';
            echo '<text class="left">' . $line['Productname'] . '</text><text class="center">' . $quantity . '</text>' . '</text><text class="right">' . $line['Sellprice'] * $quantity . ':-' . '</text>';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '</div>';
    echo '<div id="tbxorder"><a href="index.php?page=order_history">Tillbaka till orderhistorik</a></div>';
}

mysql_close($conn);
?>
