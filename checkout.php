<?php

mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

if (!isset($_SESSION)) {
    session_start();
}

echo '<div id="productstable">';
foreach ($_SESSION['cart'] as $ProductID => $quantity) {

    $sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;", $ProductID);

    $result = mysql_query($sql);
    while ($line = mysql_fetch_array($result)) {
        echo '<div class="productrow">';
        echo '<text class="left">'. $line['Productname'].'</text><text class="right">'.$quantity.'</text>';
        echo '</div>';
    }
}
echo '<div class="checkout">';
echo '<a href="index.php?page=create_order">Godkänn köp</a>';
echo '</div></div>';
?>