<?php

if (!isset($_SESSION)) {
    session_start();
}

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

//gör om kundvagnens array till en string för lagring i databas
$cart = serialize($_SESSION['cart']);
$user = $_SESSION['user'];
$date = date('Y-m-d');

$q1 = "INSERT INTO ordrar (OrderID, UserID, Products, Date) VALUES (DEFAULT, '$user', '$cart', '$date')";
$res1 = mysql_query($q1) or die(mysql_error());

echo '<div id="createorder">';
echo '<img src=Bilder/köp.png>';
echo '</div>';
mysql_close($conn);
?>