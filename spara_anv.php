<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('projekt');

$exists = false;

$förnamn = $_POST['förnamn'];
$efternamn = $_POST['efternamn'];
$personnr = $_POST['personnr'];
$adress = $_POST['adress'];
$postnr = $_POST['postnr'];
$email = $_POST['email'];
$telefonnr = $_POST['telefonnr'];
$användarid = $_POST['användarid'];
$lösenord = $_POST['lösenord'];

$query = "INSERT INTO login VALUES ('$användarid', '$lösenord')";
$result = mysql_query($query) or die(mysql_error());

//echo $result;

$query = "INSERT INTO kund (Personnr, Fornamn, Efternamn, Adress, Postnr, Email, Telefonnr, AnvID)
    VALUES ('$personnr', '$förnamn', '$efternamn', '$adress', '$postnr', '$email', '$telefonnr', '$användarid')";
$result = mysql_query($query) or die(mysql_error());

echo $result;

?>