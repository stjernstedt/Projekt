<?php

if (!isset($_SESSION)) {
    session_start();
}

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

$cart = serialize($_SESSION['cart']);

$q1 = "INSERT INTO ordrar (OrderID, UserID, Products) VALUES (DEFAULT, 'test', '$cart')";
$res1 = mysql_query($q1) or die(mysql_error());

echo '<div id="createorder">';
echo '<h1>Tack för ditt köp!</h1>';
echo '</div>';
mysql_close($conn);
?>