<?php

session_start();

$conn = mysql_connect('localhost', 'root');
mysql_select_db('projekt');
mysql_set_charset('utf8');

$error = TRUE;

/* hämtar alla användare */
$q1 = "SELECT * FROM login";
$res1 = mysql_query($q1);

/* går igenom användare och kollar om användaren som ska loggas in finns */
while ($line = mysql_fetch_array($res1)) {
    if ($line['UsersID'] == $_POST['userid']) {
        $error = FALSE;
        $user = $line;
    }
}

/* om användaren finns så kollar den om lösenord stämmer, och om det gör det loggas användaren in */
if ($error == FALSE) {
    if ($user['Password'] == $_POST['password']) {
        $_SESSION['loggedin'] = 'true';
        $_SESSION['user'] = $_POST['userid'];
    } else {
        $_SESSION['errormsg'] = 'Fel lösenord!';
    }
} else {
    $_SESSION['errormsg'] = 'Användaren finns ej!';
}

mysql_close($conn);

/* om fel uppstått skickas felet till och användaren tillbaks till inlogg sidan */
if (isset($_SESSION['errormsg'])) {
    header('Location: inlogg.php');
} else {
    header('Location: index.php');
}
?>