<?php

mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

if (!isset($_SESSION)) {
    session_start();
}





if (!isset($_SESSION['loggedin'])) {
    echo '<div id="orderhistorik">';
    echo 'Du måste registrera dig eller logga in för att göra ett köp!';
    echo '</div>';
} else {

    echo '<h1 id="orderbe">Order bekräftelse</h1>';
    echo '<div id="orderw">';
    echo '<div id="productstableheader"><text class="left">Produkt</text><text class="center">Antal</text><text class="right">Pris</text></div><br>';
    echo '<div id="productstable">';
    $total = 200;
    foreach ($_SESSION['cart'] as $ProductID => $quantity) {

        $sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;", $ProductID);

        $result = mysql_query($sql);

        while ($line = mysql_fetch_array($result)) {

            $Sellprice = $line['Sellprice'];
            $line_cost = $Sellprice * $quantity;
            $total = $total + $line_cost;

            echo '<div class="productrow">';
            echo '<text class="left">' . $line['Productname'] . '</text><text class="center">' . $quantity . '</text>'.'</text><text class="right">' . $line['Sellprice']*$quantity .';-'. '</text>';
            echo '</div>';
        }

    }
    echo '</div>';
    echo '</div>';

    echo '<div id="orderinfo">';
    echo '<h1>Betalningssätt</h1>';
    echo 'Alla betalningar sker via faktura som kommer att bli hem skickade till dig.';
    echo '<h1>Frakt</h1>';
    echo 'Vår frakt ligger på 200 kr.';
    echo '<h1>Leveranstid</h1>';
    echo '3-4 arbetsdagar';
    echo '</div>';
    echo '<div style="clear:both;"></div>';

    echo '<h1 id="ordertotal">' . 'Totalt inkl frakt: ' . $total . ' kr' . '</h1>';

    echo '<div id="checkout">';
    echo '<a href="index.php?page=create_order">Godkänn köp</a>';
    echo '</div>';
}

?>
