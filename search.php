<?php

mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

//$searchres = array();

$term = str_replace("'", "''", $_GET['term']);
$q1 = "SELECT * FROM produkter WHERE Productname = '" . $term . "' OR Belonging = '" . $term . "' OR Furnituretype = '" . $term . "'";
$res1 = mysql_query($q1);

if (mysql_num_rows($res1) == 0) {
    $noresults = TRUE;
    include('searchdisplay.php');
} else {
    echo '<div id="allavaror">';
    while ($line = mysql_fetch_array($res1)) {
        $id = $line['ProductID'];
        include('searchdisplay.php');
    }
    echo '</div>';
}


//while ($line = mysql_fetch_array($res1)) {
//    if (stristr($line['Productname'], $_GET['term']) OR stristr($line['Belonging'], $_GET['term'])
//            OR stristr($line['Furnituretype'], $_GET['term'])) {
//        $searchres[] = $line['ProductID'];
//    }
//}
//
//if (!$searchres) {
//    $noresults = TRUE;
//    include('searchdisplay.php');
//} else {
//    $searchres2 = join(',', $searchres);
//
//    $q2 = "SELECT * FROM produkter WHERE ProductID IN ($searchres2)";
//    $res2 = mysql_query($q2);
//    echo '<div id="allavaror">';
//    while ($line = mysql_fetch_array($res2)) {
//        $id = $line['ProductID'];
//        include('searchdisplay.php');
//    }
//    echo '</div>';
//}
?>