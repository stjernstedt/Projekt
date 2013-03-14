<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('projekt');

$exists = false;

$fname = $_POST['forename'];
$Sname = $_POST['surname'];
$persid = $_POST['personalcn'];
$address = $_POST['address'];
$zip = $_POST['zipcode'];
$email = $_POST['email'];
$phone = $_POST['phonenr'];
$user = $_POST['userid'];
$pass = $_POST['password'];

$query = "INSERT INTO login VALUES ('$user', '$pass')";
$result = mysql_query($query) or die(mysql_error());

//echo $result;

$query = "INSERT INTO kund (PersonalCN, Forename, Surname, Address, Zipcode, Email, Phonenumber, UserID)
    VALUES ('$persid', '$fname', '$Sname', '$address', '$zip', '$email', '$phone', '$user')";
$result = mysql_query($query) or die(mysql_error());

echo $result;

?>