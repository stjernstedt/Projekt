<?php

$conn = mysql_connect('localhost', 'root');
mysql_select_db('projekt');

$exists = false;

$forename = $_POST['förnamn'];
$surname = $_POST['efternamn'];
$personalcn = $_POST['personnr'];
$address = $_POST['adress'];
$zipcode = $_POST['postnr'];
$email = $_POST['email'];
$phonenumber = $_POST['telefonnr'];
$userid = $_POST['användarid'];
$password = $_POST['lösenord'];

/* hämtar data från databasen och gör en check om userid eller personnr redan finns */
$qcheck1 = "SELECT * FROM login";
$res1 = mysql_query($qcheck1);
while ($line = mysql_fetch_array($res1)) {
    if ($line['UsersID'] == $userid) {
        $exists = true;
        echo 'Användarnamnet är upptaget!';
        break;
    }
}
$qcheck2 = "SELECT * FROM kund";
$res2 = mysql_query($qcheck2);
while ($line = mysql_fetch_array($res2)) {
    if ($line['PersonalCN'] == $personalcn) {
        $exists = true;
        echo 'Personnummret är redan registrerat!';
        break;
    }
}


/* För in data i databasen om checkarna var ok */
if ($exists == false) {
    $q1 = "INSERT INTO login VALUES ('$userid', '$password')";
    $res3 = mysql_query($q1) or die(mysql_error());

    $q2 = "INSERT INTO kund (PersonalCN, Forename, Surname, Address, Zipcode, Email, Phonenumber, UserID)
    VALUES ('$personalcn', '$forename', '$surname', '$address', '$zipcode', '$email', '$phonenumber', '$userid')";
    $res4 = mysql_query($q2) or die(mysql_error());
}

mysql_free_result($res1);
mysql_free_result($res2);
mysql_close($conn);
?>