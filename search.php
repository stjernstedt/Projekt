<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
<html>
    <head>
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Cssmall.css">
    </head>
-->

<?php
mysql_connect('localhost', 'root');
mysql_select_db('projekt');
mysql_set_charset('utf8');

$searchres = array();

$q1 = "SELECT * FROM produkter";
$res1 = mysql_query($q1);

while ($line = mysql_fetch_array($res1)) {
    if (stristr($line['Productname'], $_GET['term'])) {
        $searchres[] = $line['ProductID'];
    }
}


if (!$searchres) {
    $noresults = TRUE;
    include('searchdisplay.php');
} else {
    $searchres2 = join(',', $searchres);

    $q2 = "SELECT * FROM produkter WHERE ProductID IN ($searchres2)";
    $res2 = mysql_query($q2);

    while ($line = mysql_fetch_array($res2)) {
        $id = $line['ProductID'];
        include('searchdisplay.php');
    }
}
?>