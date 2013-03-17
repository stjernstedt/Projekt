<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

$forename = $_POST['forename'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenr'];
$userid = $_POST['userid'];

/* uppdaterar användaren med nya värden */
$q2 = "UPDATE kund SET Forename='$forename', Surname='$surname', Address='$address',
    Zipcode='$zipcode', Email='$email', Phonenumber='$phonenumber' WHERE UserID='$userid'";
$res4 = mysql_query($q2) or die(mysql_error());

mysql_close($conn);
header('Location: index.php');
?>
