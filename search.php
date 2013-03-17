<?php
mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
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