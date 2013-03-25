<?php

mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

$term = str_replace("'", "''", $_GET['term']);
$term = str_replace(";", "", $_GET['term']);
$q1 = "SELECT * FROM produkter WHERE Productname LIKE '%{$term}%' OR Belonging LIKE '%{$term}%' OR Furnituretype LIKE '%{$term}%'";
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

?>