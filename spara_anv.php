<?php

if(!isset($_SESSION)) {
     session_start();
}

$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

$exists = false;

$forename = $_POST['forename'];
$surname = $_POST['surname'];
$personalcn = $_POST['personalcn'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenr'];
$userid = $_POST['userid'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$regex = "/^[A-ZÅÄÖ]?[a-zåäö]{2,24}$/";
if(!preg_match($regex, $forename)) {
    $_SESSION['errormsg'] = "Ej korrekt förnamn!";
    header('Location: index.php?page=registrera');
    exit();
}

if(!preg_match($regex, $surname)) {
    $_SESSION['errormsg'] = "Ej korrekt efternamn!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/\d{10}/";
if(!preg_match($regex, $personalcn)) {
    $_SESSION['errormsg'] = "Ej korrekt personnummer!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/^[A-ZÅÄÖ]?[a-zåäö]{4,20}\s\d{1,4}$/";
if(!preg_match($regex, $address)) {
    $_SESSION['errormsg'] = "Ej korrekt adress!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/^\d{3}\s?\d{2}$/";
if(!preg_match($regex, $zipcode)) {
    $_SESSION['errormsg'] = "Ej korrekt postnummer!";
    header('Location: index.php?page=registrera');
    exit();
} else {$zipcode = str_replace(' ', '', $zipcode);}

$regex = "/\w+@\w+\.+\w+/";
if(!preg_match($regex, $email)) {
    $_SESSION['errormsg'] = "Ej korrekt namn!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/\d{9,10}/";
if(!preg_match($regex, $phonenumber)) {
    $_SESSION['errormsg'] = "Ej korrekt telefonnummer!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/\S{3,25}/";
if(!preg_match($regex, $userid)) {
    $_SESSION['errormsg'] = "Välj ett användarnamn mellan 3 och 50 tecken!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = "/\S{3,50}/";
if(!preg_match($regex, $password)) {
    $_SESSION['errormsg'] = "Välj ett lösenord mellan 3 och 50 tecken!";
    header('Location: index.php?page=registrera');
    exit();
}

$regex = '/'.$password.'/';
if(!preg_match($regex, $password2)) {
    $_SESSION['errormsg'] = "Lösenordet är inte samma!";
    echo $password.'<br>'.$password2;
//    header('Location: index.php?page=registrera');
    exit();
}

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

$_SESSION['loggedin'] = 'true';
$_SESSION['user'] = $_POST['userid'];
mysql_free_result($res1);
mysql_free_result($res2);
mysql_close($conn);
header('Location: index.php');
?>